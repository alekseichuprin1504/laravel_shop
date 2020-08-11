@extends('layouts.site')

@section('header')
    @include('admin.admin_header')
@endsection

@section('content')

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/order">Управление заказами</a></li>
                    <li class="active">Просмотр заказа</li>
                </ol>
            </div>


            <h4>Просмотр заказа #{{$order->id}}</h4>
            <br/>




            <h5>Информация о заказе</h5>
            <table class="table-admin-small table-bordered table-striped table">
                <tr>
                    <td>Номер заказа</td>
                    <td>{{$order->id}}</td>
                </tr>
                <tr>
                    <td>Имя клиента</td>
                    <td>{{$order->name}}</td>
                </tr>
                <tr>
                    <td>Телефон клиента</td>
                    <td>{{$order->phone}}</td>
                </tr>


                <tr>
                    <td>ID клиента</td>
                    <td>{{$order->user_id}}</td>
                </tr>

                <tr>
                    <td><b>Статус заказа</b></td>
                    <td>{{$order->status}}</td>
                </tr>
                <tr>
                    <td><b>Дата заказа</b></td>
                    <td>{{$order->created_at}}</td>
                </tr>
            </table>

            <h5>Товары в заказе</h5>

            <table class="table-admin-medium table-bordered table-striped table ">
                <tr>
                    <th>ID товара</th>
                    <th>Артикул товара</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Количество</th>
                </tr>
                @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->code}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$order->countGoods()}}</td>
                </tr>
                @endforeach
            </table>

            <a href="{{route('cabinet')}}" class="btn btn-default back"><i class="fa fa-arrow-left"></i> Назад</a>
        </div>


</section>

@endsection

@section('footer')
    @include('site.footer')
@endsection
