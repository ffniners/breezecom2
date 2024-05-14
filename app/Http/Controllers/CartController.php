<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Statamic\Facades\Site;
use App\Repositories\CartRepository;
use Illuminate\Support\Facades\Log;


class CartController extends Controller

{
    
        public function index()
        {
            $cartContents = Statamic::tag('sc:cart:contents')->render();
    
            return Inertia::render('Cart', [
                'cartItems' => $cartContents,
            ]);
        }
    
}




















/*
{
    protected $cart;

    public function __construct(CartRepository $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        $cartItems = $this->cart->get();

        return inertia('Cart', [
            'cartItems' => $cartItems,
        ]);
    }
/
    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        \Log::info('Adding product to cart:', [
            'product_id' => $productId,
            'quantity' => $quantity,
        ]);
        $this->cart->add($productId, $quantity);

        return redirect()->route('cart.index')->with('success', 'Product added to cart.');
    }

    public function update(Request $request, $productId)
    {
        $quantity = $request->input('quantity');

        $this->cart->update($productId, $quantity);

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully.');
    }

    public function remove($productId)
    {
        $this->cart->remove($productId);

        return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
    }
}

*/






