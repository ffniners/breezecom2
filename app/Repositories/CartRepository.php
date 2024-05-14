<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Statamic\Facades\Entry;

class CartRepository
{

    public function get()
{
    $cartItems = Session::get('cart', []);

    // Convert numeric keys to string keys
    $cartItems = array_reduce(array_keys($cartItems), function ($acc, $key) use ($cartItems) {
        $acc[$key] = $cartItems[$key];
        return $acc;
    }, []);

    return $cartItems;
}
    /*
    public function get()
    {
        return Session::get('cart', []);
    }
    */


    public function add($productId, $quantity = 1)
    {
        $cartItems = $this->get();
        Log::info('Existing cart items:', $cartItems);

        $entry = Entry::find($productId); // Retrieve the Statamic entry

        if (isset($cartItems[$productId])) {
            $cartItems[$productId]['quantity'] += $quantity;
        } else {
            $cartItems[$productId] = [
                'product_id' => $productId,
                'quantity' => $quantity,
                'price' => $entry->value('price'), // Get the 'price' property from the entry
                'description' => $entry->value('description'), // Get the 'description' property from the entry
            ];
        }

        Log::info('Updated cart items:', $cartItems);
        Session::put('cart', $cartItems);
    }

    /*
    public function add($productId, $quantity = 1)
{
    $cartItems = $this->get();

    \Log::info('Existing cart items:', $cartItems);

    if (isset($cartItems[$productId])) {
        $cartItems[$productId]['quantity'] += $quantity;
    } else {
        $cartItems[$productId] = [
            'product_id' => $productId,
            'quantity' => $quantity,
        ];
    }

    \Log::info('Updated cart items:', $cartItems);

    Session::put('cart', $cartItems);
}
*/
  



    public function update($productId, $quantity)
    {
        $cartItems = $this->get();
        

        if (isset($cartItems[$productId])) {
            $cartItems[$productId]['quantity'] = $quantity;
            Session::put('cart', $cartItems);
        }
    }

    public function remove($productId)
    {
        $cartItems = $this->get();

        if (isset($cartItems[$productId])) {
            unset($cartItems[$productId]);
            Session::put('cart', $cartItems);
        }
    }

    public function clear()
    {
        Session::forget('cart');
    }
}