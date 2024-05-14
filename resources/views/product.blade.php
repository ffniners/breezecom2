<!-- views/product.blade.php -->

@extends('layouts.app')

@section('title', 'product')


@section('content')
@php
$productId = request('product_id');
$product = Statamic::tag('collection:products')->param('id:', $productId)->toJson();
$cartItems = Statamic::tag('sc:cart')->toJson();

$form = Statamic::tag('sc:cart:addItem')->params([
    'redirect' => '/cart',
])->fetch();

$formAttrs = $form['attrs_html'];
$formParams = $form['params_html'];
$cartitems = Statamic::tag('sc:cart:items')->fetch();
@endphp




    <div id="app">
        <div>
            wedwedwed
        </div>
        <Product :product="{{ $product }}" :form-attrs="{{ json_encode($form['attrs'])}}" :form-params="{{ json_encode($formParams) }}" :product-id="{{ json_encode($productId)}}" cartitems="{{json_encode($cartitems)}}">
        </Product>
    </div>
@endsection
@section('scripts')
@vite('resources/js/app.js')
@endsection