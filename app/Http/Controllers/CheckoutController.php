<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Statamic\Facades\Site;
use Statamic\Simple_Commerce\Contracts\CartRepository;

class CheckoutController extends Controller
{
    protected $cart;

    public function __construct(CartRepository $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        $cart = $this->cart->get();

        return view('checkout', compact('cart'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
            'country' => 'required|string',
        ]);

        $cart = $this->cart->get();

        $order = Order::create([
            'user_id' => Auth::id(),
            'billing_name' => $request->input('name'),
            'billing_email' => $request->input('email'),
            'billing_address' => $request->input('address'),
            'billing_city' => $request->input('city'),
            'billing_postal_code' => $request->input('postal_code'),
            'billing_country' => $request->input('country'),
            'total' => $cart->total(),
        ]);

        foreach ($cart->items() as $item) {
            $order->items()->create([
                'product_id' => $item->id,
                'name' => $item->name,
                'price' => $item->price,
                'quantity' => $item->quantity,
                'subtotal' => $item->total,
            ]);
        }

        $this->cart->clear();

        return redirect()->route('confirmation', $order);
    }
}