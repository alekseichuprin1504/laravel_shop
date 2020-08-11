@extends('layouts.site')

@section('header')
    @include('site.header')
@endsection

@section('content')

    <section>
        <div class="container">
            <div class="row">

                <br/>



                <h4>Просмотр заказа #{{$order->id}}</h4>
                <br/>




                <h5>Информация о заказе</h5>

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
