<!-- views/cart.blade.php -->

@extends('layouts.app')

@section('title', 'checkout')


@section('content')
@php

@endphp
  
@antlers
<div>
    <div id="payment-element">
        <!--Stripe.js injects the Payment Element-->
    </div>
    <div id="payment-message" class="hidden"></div>
</div>
 
<input id="stripePaymentMethod" type="hidden" name="payment_method">
 
<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('pk_test_51PDBNlFaRyB6tux2qGsdXR5qx9ikHtt6cKkl2l64Y9skAwYyHwbiPFO3CA5IDPXD4t1DcYjAiQQU0hJSGuDlgAtH00wJAHMfSi');
 
    let elements;
 
    checkStatus();
 
    elements = stripe.elements({
        clientSecret: '{{ stripe:client_secret }}'
    });
 
    const paymentElementOptions = {
        layout: "tabs",
    };
 
    const paymentElement = elements.create("payment", paymentElementOptions);
    paymentElement.mount("#payment-element");
 
    async function confirmPayment() {
        const {
            error
        } = await stripe.confirmPayment({
            elements,
            confirmParams: {
                return_url: "{{ stripe:callback_url }}",
            },
        });
 
        // This point will only be reached if there is an immediate error when
        // confirming the payment. Otherwise, your customer will be redirected to
        // your `return_url`. For some payment methods like iDEAL, your customer will
        // be redirected to an intermediate site first to authorize the payment, then
        // redirected to the `return_url`.
        if (error.type === "card_error" || error.type === "validation_error") {
            showMessage(error.message);
        } else {
            showMessage("An unexpected error occurred.");
        }
    }
 
    // Fetches the payment intent status after payment submission
    async function checkStatus() {
        const clientSecret = new URLSearchParams(window.location.search).get(
            "payment_intent_client_secret"
        );
 
        if (!clientSecret) {
            return;
        }
 
        const {
            paymentIntent
        } = await stripe.retrievePaymentIntent(clientSecret);
 
        switch (paymentIntent.status) {
            case "succeeded":
                showMessage("Payment succeeded!");
                break;
            case "processing":
                showMessage("Your payment is processing.");
                break;
            case "requires_payment_method":
                showMessage("Your payment was not successful, please try again.");
                break;
            default:
                showMessage("Something went wrong.");
                break;
        }
    }
 
    // ------- UI helpers -------
 
    function showMessage(messageText) {
        const messageContainer = document.querySelector("#payment-message");
 
        messageContainer.classList.remove("hidden");
        messageContainer.textContent = messageText;
 
        setTimeout(function() {
            messageContainer.classList.add("hidden");
            messageText.textContent = "";
        }, 4000);
    }
</script>
@endantlers

@endsection
@section('scripts')
@vite('resources/js/app.js')
@endsection