@extends('layouts.site')

@section('title', $product->name)

@section('header')
    @include('site.header')
@endsection

@section('content')
    @include('site.product_content')
@endsection

@section('footer')
    @include('site.footer')
@endsection
