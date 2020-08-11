@extends('layouts.site')

@section('title', 'Товары')

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
                        <li><a href="{{route('admin')}}">Админпанель</a></li>
                        <li class="active">Управление товарами</li>
                    </ol>
                </div>

                <a href="{{route('products.create')}}" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить товар</a>
                @if(session()->has('success'))
                    <p class="alert alert-success">{{session()->get('success')}}</p>
                @endif
                @if(session()->has('warning'))
                    <p class="alert alert-warning">{{session()->get('warning')}}</p>
                @endif
                <h4>Список товаров</h4>

                <br/>

                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID товара</th>
                        <th>Артикул</th>
                        <th>Название товара</th>
                        <th>Цена</th>
                        <th>Кол-во</th>
                        <th>Редактировать</th>
                        <th>Удалить</th>
                    </tr>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->code}}</td>
                        <td><a href="{{route('products.show', $product)}}">{{$product->name}}</a></td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->count}}</td>
                        <td><a href="{{route('products.edit', $product)}}" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <form action="{{route('products.destroy', $product)}}" method="POST"><td><button type="submit"><i class="fa fa-times"></i></button></td>
                            @csrf
                            @method('DELETE')
                        </form>
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
