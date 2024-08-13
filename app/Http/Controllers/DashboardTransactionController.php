<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Models\RentProduct;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DashboardTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rents = Rent::latest()->get();

        return view('dashboard.transactions.index', compact('rents'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rentProducts = RentProduct::where('rent_id', $id)->get();

        return view('dashboard.transactions.detail', compact('rentProducts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Rent::where('id', $id)->update(['status' => 'Confirmed']);

        $rent = Rent::find($id);

        $rentProducts = RentProduct::where('rent_id', $rent->id)->get();

        $userEmail = $rent->user->email;

        $token = Str::random(64);

        Mail::send('email.confirm-transaction', ['token' => $token, 'rent' => $rent, 'rentProducts' => $rentProducts], function ($message) use ($userEmail) {
            $message->to($userEmail);
            $message->subject('Rent Confirmed');
        });

        return back()->with('success', 'Transaction has been confirmed');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
