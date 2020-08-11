@extends('layouts.site')


@if(Auth::user()->isAdmin())
@section('header')
    @include('admin.admin_header')
@endsection
@else
@section('header')
    @include('site.header')
@endsection
@endif

@section('content')
    <section>
        <div class="container">
            <div class="row">

                <br/>

                @admin
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Админпанель</a></li>
                        <li class="active">Управление заказами</li>
                    </ol>
                </div>
                @endadmin

                <h4>Список заказов</h4>

                <br/>


                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID заказа</th>
                        <th>Имя покупателя</th>
                        <th>Телефон покупателя</th>
                        <th>Дата оформления</th>
                        <th>Сумма заказа</th>
                        <th></th>
                        <th></th>
                        <th></th>
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
                        <td>{{$order->calculateForSum()}}</td>
                        <td>
                            @if(Auth::user()->isAdmin())
                            <a href="{{route('admin-show-order', $order)}}" title="Смотреть"><i class="fa fa-eye"></i></a>
                            @else
                                <a href="{{route('user-orders', $order)}}" title="Смотреть"><i class="fa fa-eye"></i></a>
                                @endif
                        </td>
                        <td><a href="#" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="#" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </section>
@endsection

@section('footer')
    @include('site.footer')
@endsection
