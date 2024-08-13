<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest();

        if (request('search')) {
            $products->where('name', 'like', '%' . request('search') . '%')->orWhere('description', 'like', '%' . request('search') . '%');
        } else if (request('category')) {
            $products->where('category_id', request('category'));
        }

        return view('products.index', [
            'products' => $products->paginate(4),
            'header' => request('search')
        ]);
    }

    public function show(Product $product)
    {
        return view('products.detail', [
            'product' => $product
        ]);
    }
}
