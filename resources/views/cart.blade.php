<!-- views/cart.blade.php -->

@extends('layouts.app')

@section('title', 'cart')


@section('content')
@php

  $cartitems = Statamic::tag('sc:cart:items')->fetch();
  $itemsTotal = Statamic::tag('sc:cart:items_total');
  $grandTotal = Statamic::tag('sc:cart:grand_total');

  @endphp
  
  <div id="app">
  <Cart
    :itemstotal="'{{ $itemsTotal }}'"
    :cartitems="{{json_encode($cartitems)}}"
    :grandtotal="'{{ $grandTotal }}'"

  >
  </Cart>
</div>

@endsection
@section('scripts')
@vite('resources/js/app.js')
@endsection


