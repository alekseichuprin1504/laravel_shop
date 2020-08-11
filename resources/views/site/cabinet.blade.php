@extends('layouts.site')

@section('title', 'Корзина')


@section('header')
    @include('site.header')
@endsection

@section('content')
<section>
    <div class="container">
        <div class="row">

            <h3>Кабинет пользователя</h3>

            <h3>Привет, {{$user->name}}</h3>
            <section>
                <div class="container">
                    <div class="row">

                        <br/>

                        <h4>Список заказов</h4>

                        <br/>


                        <table class="table-bordered table-striped table">
                            <tr>
                                <th>ID заказа</th>
                                <th>Имя покупателя</th>
                                <th>Телефон покупателя</th>
                                <th>Дата оформления</th>
                                <th>Сумма заказа</th>
                                <th>Просмотр Заказа</th>
                            </tr>
                            @foreach($orders as $order)
                                <tr>
                                    <td>
                                        <a href="#">
                                            {{$order->id}}
                                        </a>
                                    </td>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->phone}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>{{$order->getFullPrice()}}</td>
                                    <td><a href="{{route('user-orders', $order)}}" title="Смотреть"><i class="fa fa-eye"></i></a></td>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
            </section>

        </div>
    </div>
</section>
@endsection

@section('footer')
    @include('site.footer')
@endsection
