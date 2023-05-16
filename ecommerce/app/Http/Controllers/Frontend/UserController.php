<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class UserController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();
        return view('frontend.orders.index', compact('orders'));
    }

    public function view($orderId)
    {
        $orders = Order::where('id', $orderId)->where('user_id', Auth::id())->first();
        return view('frontend.orders.view', compact('orders'));
    }
}