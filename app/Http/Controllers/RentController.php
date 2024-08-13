<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use App\Models\Cart;
use App\Models\Rent;
use App\Models\User;
use Midtrans\Config;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\RentProduct;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateRentRequest;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);
        $rents = Rent::latest()->where('user_id', $user->id)->get();

        return view('user.rent.index', [
            'rents' => $rents
        ]);
    }

    public function checkout()
    {
        $userId = auth()->user()->id;
        $user = User::find($userId);

        // Cart Items
        $items = Cart::all()->where('user_id', $userId);

        if (auth()->user()->username == 'admin') {
            return back()->with('error', 'You are an admin');
        }

        if ($user->address == NULL) {
            return redirect('/user/profile')->with('warning', 'Add your address before continue!');
        } else {
            return view('user.rent.checkout', [
                'items' => $items
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = auth()->user()->id;
        $items = Cart::all()->where('user_id', $userId);

        $duration = $request->duration;
        $rentStart = $request->rent_start;
        $rentEnd = $request->rent_end;
        $rentId = uniqid('MAL-');

        $rentData = [
            'rent_id' => $rentId,
            'user_id' => $userId,
            'duration' => $duration,
            'rent_start' => $rentStart,
            'rent_end' => $rentEnd,
            'status' => 'Unpaid',
        ];

        Rent::create($rentData);

        $rents = Rent::where('rent_id', $rentId)->get();

        foreach ($rents as $rent) {
            $rent_id = $rent->id;
            $id_rent = $rent->rent_id;
        }

        foreach ($items as $item) {
            $rentProductData = [
                'rent_id' => $rent_id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'total_price' => $item->subtotal
            ];

            RentProduct::create($rentProductData);
        }

        $total_pay = $items->sum('subtotal') * $duration;

        $rent_products = RentProduct::where('rent_id', $rent_id)->get();

        Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = false;
        // Set sanitization on (default)
        Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $id_rent,
                'gross_amount' => $total_pay,
            ],
            'customer_details' => [
                'first_name' => $rent->user->name,
                'email' => $rent->user->email
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('user.rent.payment', [
            'rents' => $rents,
            'rent_products' => $rent_products,
            'pay_token' => $snapToken
        ]);
    }

    public function reStore(Request $request)
    {
        $rentId = $request->rent_id;
        $rent = Rent::find($rentId);
        $rentProducts = RentProduct::where('rent_id', $rentId)->get();

        $duration = $rent->duration;
        $total_pay = $rentProducts->sum('total_price') * $duration;

        Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = false;
        // Set sanitization on (default)
        Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $rent->rent_id,
                'gross_amount' => $total_pay,
            ],
            'customer_details' => [
                'first_name' => $rent->user->name,
                'email' => $rent->user->email
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('user.rent.payment', [
            'pay_token' => $snapToken
        ]);
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        $rent = Rent::where('rent_id', $request->order_id)->get();
        $rentId = $rent[0]->id;
        $rentProducts = RentProduct::where('rent_id', $rentId)->get();
        $userId = $rent[0]->user_id;

        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture' || $request->fraud_status == 'accept') {
                $rentData = Rent::find($rentId);
                $rentData->update(['status' => 'Paid']);

                Cart::where('user_id', $userId)->delete();

                foreach ($rentProducts as $rp) {
                    Product::where('id', $rp->product_id)->update(['stock' => ($rp->product->stock) - $rp->quantity]);
                }

                Rent::where('id', $rentId)->update(['payment_method' => $request->payment_type]);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $rentId = request('id');

        $rent = Rent::find($rentId);

        $rent_products = RentProduct::where('rent_id', $rentId)->get();

        return view('user.rent.detail', compact('rent_products', 'rent'));
    }

    public function print()
    {
        $rentId = request('id');
        $rent = Rent::find($rentId);
        $rentProducts = RentProduct::where('rent_id', $rentId)->get();

        if (auth()->user()->id == $rent->user_id) {
            $pdf = PDF::loadView('user.rent.rent-pdf', [
                'rent' => $rent,
                'rentProducts' => $rentProducts
            ]);
            return $pdf->download('invoice-' . $rent->rent_id . '.pdf');
        } else {
            return back()->with('error', 'You are not a valid user 🫣');
        }
    }

    public function pdf()
    {
        return view('user.rent.rent-pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rent $rent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRentRequest $request, Rent $rent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rent $rent)
    {
        //
    }
}
