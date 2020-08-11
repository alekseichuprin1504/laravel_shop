@extends('layouts.site')

@section('title', 'Корзина')


@section('header')
    @include('site.header')
@endsection

@section('content')
    @include('site.content_cart')
@endsection

@section('footer')
    @include('site.footer')
@endsection
