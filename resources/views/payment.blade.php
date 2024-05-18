<!-- views/payment.blade.php -->

@extends('layouts.app')

@section('title', 'payment')

@section('content')



@antlers
---
title: Checkout
---

<h1>Checkout</h1>

{{ sc:cart:items }}
  <div>
    <h3>{{ product:title }}</h3>
    <p>Quantity: {{ quantity }}</p>
    <p>Price: {{ price }}</p>
  </div>
{{ /sc:cart:items }}

<h2>Payment</h2>

{{ sc:gateways }}
  {{ if gateway == "DuncanMcClean\SimpleCommerce\Gateways\Builtin\StripeGateway" }}
    <div>
      <h3>Stripe Payment</h3>
      <div>
        <div id="payment-element">
          <!--Stripe.js injects the Payment Element-->
        </div>
        <div id="payment-message" class="hidden"></div>
      </div>
      <input id="stripePaymentMethod" type="hidden" name="payment_method">
    </div>
  {{ /if }}
{{ /sc:gateways }}

<button id="checkout-button" onclick="confirmPayment()">Pay Now</button>

<script src="https://js.stripe.com/v3/"></script>
<script>
  console.log("Script started");
  var stripe = Stripe('pk_test_51PDBNlFaRyB6tux2qGsdXR5qx9ikHtt6cKkl2l64Y9skAwYyHwbiPFO3CA5IDPXD4t1DcYjAiQQU0hJSGuDlgAtH00wJAHMfSi');

  let elements;
 
  checkStatus();

  elements = stripe.elements({
    clientSecret: '{{ stripe:client_secret }}'
  });


 

  console.log('Client Secret:', elements.clientSecret);
  console.log("cat");

  const paymentElementOptions = {
    layout: "tabs",
  };

  const paymentElement = elements.create("payment", paymentElementOptions);
  paymentElement.mount("#payment-element");

  async function confirmPayment() {
    const { error } = await stripe.confirmPayment({
      elements,
      confirmParams: {
        return_url: "{{ stripe:callback_url }}",
      },
    });

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
      return console.log("wed");
    }

    const { paymentIntent } = await stripe.retrievePaymentIntent(clientSecret);

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

    setTimeout(function () {
      messageContainer.classList.add("hidden");
      messageText.textContent = "";
    }, 4000);
  }
</script>

@endantlers

@endsection
@section('scripts')

@endsection