<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Store;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->orderBy('id', 'DESC')->paginate(15);

        $stores = Store::all();

        return view('welcome', compact('products', 'stores'));
    }

    public function single($slug)
    {
        $product = $this->product->whereSlug($slug)->first();

        return view('singles', compact('product'));
    }
}
