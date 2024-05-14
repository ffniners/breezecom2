@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Order Confirmation</h1>

        <div class="bg-white rounded-lg shadow-md p-6">
            <p class="text-lg mb-4">Thank you for your order!</p>
            <p class="mb-4">Your order has been successfully placed and will be processed shortly.</p>
            <p class="mb-4">Order Number: <strong>{{ $order->id }}</strong></p>
            <p class="mb-4">Order Date: <strong>{{ $order->created_at->format('F j, Y') }}</strong></p>

            <h2 class="text-xl font-semibold mb-4">Order Details</h2>
            <table class="w-full table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Product</th>
                        <th class="px-4 py-2">Price</th>
                        <th class="px-4 py-2">Quantity</th>
                        <th class="px-4 py-2">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->items as $item)
                        <tr>
                            <td class="border px-4 py-2">{{ $item->product->name }}</td>
                            <td class="border px-4 py-2">{{ $item->price }}</td>
                            <td class="border px-4 py-2">{{ $item->quantity }}</td>
                            <td class="border px-4 py-2">{{ $item->subtotal }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4 text-right">
                <p class="text-lg">Total: {{ $order->total }}</p>
            </div>

            <h2 class="text-xl font-semibold mt-8 mb-4">Billing Details</h2>
            <p>{{ $order->billing_name }}</p>
            <p>{{ $order->billing_email }}</p>
            <p>{{ $order->billing_address }}</p>
            <p>{{ $order->billing_city }}, {{ $order->billing_postal_code }}</p>
            <p>{{ $order->billing_country }}</p>

            <div class="mt-8 text-center">
                <a href="{{ route('shop.index') }}" class="btn btn-primary">Continue Shopping</a>
            </div>
        </div>
    </div>
@endsection