<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UserOrder;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->store->orders()->paginate(15);

        return view('admin.orders.index', compact('orders'));
    }
}
