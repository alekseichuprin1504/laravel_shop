@extends('layouts.site')

@section('title', 'Категория '.$category->name)

@section('header')
    @include('site.header')
@endsection

@section('content')
    @include('site.content_category_products')
@endsection

@section('footer')
    @include('site.footer')
@endsection
