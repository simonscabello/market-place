<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index($slug)
    {
        $store = Store::whereSlug($slug)->first();

        return view('store', compact('store'));
    }
}
