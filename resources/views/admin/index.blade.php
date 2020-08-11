@extends('layouts.site')

@section('title', 'Панель администратора')

@section('header')
    @include('admin.admin_header')
@endsection

@section('content')
<section>
    <div class="container">
        <div class="row">

            <br/>

            <h4>Добрый день, администратор!</h4>

            <br/>

            <p>Вам доступны такие возможности:</p>

            <br/>

            <ul>
                <li><a href="{{route('products.index')}}">Управление товарами</a></li>
                <li><a href="{{route('categories.index')}}">Управление категориями</a></li>
                <li><a href="{{route('admin-orders')}}">Управление заказами</a></li>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{route('home')}}"><i class="fa fa-sign-out"></i>На сайт</a></li>
                        </ul>
                    </div>
                </div>
            </ul>

        </div>
    </div>
</section>
@endsection


