@extends('layouts.app')

@section('title', 'payment')

@section('content')

@php
$checkoutForm = Statamic::tag('sc:checkout')->params([
    'redirect' => '/thanks',
])->fetch();

$gatewayForm = Statamic::tag('sc:gateways:stripe')->fetch();
@endphp

@if (isset($checkoutForm['is_paid']) && $checkoutForm['is_paid'])
    <p>Checkout complete!</p>
@else
    <form id="payment-form" {!! $checkoutForm['attrs_html'] ?? '' !!}>
        {!! $checkoutForm['params_html'] ?? '' !!}
        
        <input type="text" name="customer[name]" placeholder="Full Name" required>
        <input type="email" name="customer[email]" placeholder="Email" required>
        
        <input type="text" name="gift_note" placeholder="Gift Note">
        
        <div id="card-element"><!-- Stripe.js will inject the Card Element here --></div>
        
        <div id="card-errors" role="alert"></div>
        
        <button type="submit">Checkout</button>
        
        <!-- Stripe-specific hidden inputs -->
        <input type="hidden" name="payment_method" value="stripe">
        <input type="hidden" name="stripe_intent" value="{{ $checkoutForm['stripe']['intent'] ?? '' }}">
        <input type="hidden" name="stripe_client_secret" value="{{ $checkoutForm['stripe']['client_secret'] ?? '' }}">
        <input type="hidden" name="stripe_callback_url" value="{{ $checkoutForm['stripe']['callback_url'] ?? '' }}">
    </form>
@endif
<script src="https://js.stripe.com/v3/"></script>
<script>
    // Create a Stripe client
    var stripe = Stripe('{{ $checkoutForm["stripe"]["config"]["key"] }}');

    // Create an instance of Elements
    var elements = stripe.elements();

    // Create an instance of the card Element
    var card = elements.create('card');

    // Add an instance of the card Element into the `card-element` <div>
    card.mount('#card-element');

    // Handle real-time validation errors from the card Element
    card.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.confirmCardPayment('{{ $checkoutForm["stripe"]["client_secret"] }}', {
            payment_method: {
                card: card,
                billing_details: {
                    name: form.querySelector('input[name="customer[name]"]').value,
                    email: form.querySelector('input[name="customer[email]"]').value,
                }
            }
        }).then(function(result) {
            if (result.error) {
                // Show error to your customer (e.g., insufficient funds)
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // The payment has been processed!
                if (result.paymentIntent.status === 'succeeded') {
                    form.submit();
                }
            }
        });
    });
</script>

@endsection

