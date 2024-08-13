<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Models\Product;
use App\Models\RentProduct;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class DashboardProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.products.index', [
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.products.create', [
            'categories' => ProductCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'image|file|max:1024',
            'name' => 'required|max:255',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);

        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('product-images');
        }

        Product::create($validated);

        return redirect('/dashboard/products')->with('success', 'New product has been successfully added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('dashboard.products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('dashboard.products.edit', [
            'categories' => ProductCategory::all(),
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'image' => 'image|file|max:1024',
            'name' => 'required|max:255',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);

        if ($request->file('image')) {

            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validated['image'] = $request->file('image')->store('product-images');
        }

        Product::where('id', $product->id)->update($validated);

        return redirect('/dashboard/products')->with('success', 'Product has been successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $rents = Rent::all()->where('status', 'Confirmed');

        foreach ($rents as $rent) {
            $rentId[] = $rent->id;
        }

        $rentProducts = RentProduct::whereIn('rent_id', $rentId)->get();

        foreach ($rentProducts as $rp) {
            $productId[] = $rp->product_id;
        }

        if (in_array($product->id, $productId)) {
            return back()->with('error', 'This product is currently being rented');
        } else {
            Product::destroy($product->id);

            if ($product->image) {
                Storage::delete($product->image);
            }

            return redirect('/dashboard/products')->with('success', 'Product has been deleted!');
        }
    }
}
