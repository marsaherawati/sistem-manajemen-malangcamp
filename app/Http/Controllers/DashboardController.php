<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'products' => Product::all(),
            'users' => User::all(),
            'rents' => Rent::all(),
        ]);
    }
}
