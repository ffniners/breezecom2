<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Statamic\Facades\Site;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->latest()->get();

        return inertia('Orders', [
            'orders' => $orders,
        ]);
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);

        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return inertia('Order', [
            'order' => $order,
        ]);
    }
}