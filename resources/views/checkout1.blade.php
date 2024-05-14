@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Checkout</h1>

        <div class="flex">
            <div class="w-1/2">
                <h2 class="text-xl font-semibold mb-4">Billing Details</h2>
                <form action="{{ route('checkout.process') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block font-semibold mb-1">Name</label>
                        <input type="text" id="name" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block font-semibold mb-1">Email</label>
                        <input type="email" id="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded">
                    </div>
                    <div class="mb-4">
                        <label for="address" class="block font-semibold mb-1">Address</label>
                        <input type="text" id="address" name="address" required class="w-full px-4 py-2 border border-gray-300 rounded">
                    </div>
                    <div class="mb-4">
                        <label for="city" class="block font-semibold mb-1">City</label>
                        <input type="text" id="city" name="city" required class="w-full px-4 py-2 border border-gray-300 rounded">
                    </div>
                    <div class="mb-4">
                        <label for="postal_code" class="block font-semibold mb-1">Postal Code</label>
                        <input type="text" id="postal_code" name="postal_code" required class="w-full px-4 py-2 border border-gray-300 rounded">
                    </div>
                    <div class="mb-4">
                        <label for="country" class="block font-semibold mb-1">Country</label>
                        <input type="text" id="country" name="country" required class="w-full px-4 py-2 border border-gray-300 rounded">
                    </div>
                    <button type="submit" class="btn btn-primary">Place Order</button>
                </form>
            </div>

            <div class="w-1/2 ml-8">
                <h2 class="text-xl font-semibold mb-4">Order Summary</h2>
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
                        @foreach ($cart->items() as $item)
                            <tr>
                                <td class="border px-4 py-2">{{ $item->name }}</td>
                                <td class="border px-4 py-2">{{ $item->price }}</td>
                                <td class="border px-4 py-2">{{ $item->quantity }}</td>
                                <td class="border px-4 py-2">{{ $item->total }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4 text-right">
                    <p class="text-lg">Total: {{ $cart->total() }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection