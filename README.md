<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).




import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaLink } from '@inertiajs/inertia-vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';



const appName = import.meta.env.VITE_APP_NAME || 'Laravel';



createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('InertiaLink', InertiaLink)
            .mount(el);
    },
   
});





const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: async (name) => {
    const page = await resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue'));
    return page;
  },
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) });
    app.use(plugin);
    app.mount(el);
    app.component('InertiaLink', InertiaLink);
  },
});




$cart = Statamic::tag('sc:cart');
$cartItems = Statamic::tag('sc:cart:items')->toJson();
$itemsTotal = Statamic::tag('sc:cart:items_total')->toJson();
$grandTotal = Statamic::tag('sc:cart:grandTotal')->toJson(); 



@php
$cartitems = Statamic::tag('sc:cart:items')->fetch();


@endphp

    <div id="app">
        <div>
            wedwedwed
        </div>
        @antlers
        <Cart :scCartTotal="'{{ sc:cart:total }}'" :itemsTotal="'{{sc:cart:items_total}}'" :cartitems="{{$cartitems}}" :grandTotal="'{{sc:cart:grandTotal}}'" >
        </Cart>
        @endantlers
        
    </div>



<!-- views/payment.blade.php -->

@extends('layouts.app')

@section('title', 'payment')

@section('content')
@php

@endphp

  
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





import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';



export default defineConfig({
    plugins: [
        vue(), 
        laravel({
            input: [ 'resources/js/app.js'],
            refresh: true,
            detectTls: 'breezecom2.test',
            //ssr: 'resources/js/ssr.js',
           
            postcssPlugins: [
                require('tailwindcss'),
            ],
           
           
        }),
    ],
    /*
    server: {
        https: true,
        host: 'localhost',
      },
      */
      server: { 
        https: true,
        host: true,
        port: 3009,
        hmr: {host: 'localhost', protocol: 'ws'},
      cors: {
        origin: 'https://breezecom2.test',
        methods: ['GET', 'POST'],
        allowedHeaders: ['Content-Type', 'X-Requested-With', 'X-CSRF-TOKEN'],
    },},
    resolve: {
        alias: {
            'vue': 'vue/dist/vue.esm-bundler.js',
        },
    },
});