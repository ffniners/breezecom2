<!-- views/home.blade.php -->

@extends('layouts.app')

@section('title', 'home')



@section('content')
@php
$products = Statamic::tag('collection:products')->toJson(); 
@endphp
    <div id="app">
        <div>
            wedwedwed
        </div>
        <Home :products="{{ $products }}">
        </Home>
    </div>
@endsection
@section('scripts')
@vite('resources/js/app.js')
@endsection

