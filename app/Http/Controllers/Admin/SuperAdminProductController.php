<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class SuperAdminProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }
}
