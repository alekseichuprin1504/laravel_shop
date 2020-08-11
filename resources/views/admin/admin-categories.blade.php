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
                        <li class="active">Управление категориями</li>
                    </ol>
                </div>

                <a href="{{route('categories.create')}}" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить категорию</a>

                <h4>Список категорий</h4>

                <br/>

                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID категории</th>
                        <th>Название категории</th>
                        <th>Редактировать</th>
                        <th>Удалить</th>
                    </tr>
                        @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="#">{{$category->name}}</a></td>
                        <td><a href="{{route('categories.edit', $category)}}" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        
                            <form action="{{route('categories.destroy', $category)}}" method="POST"><td><button type="submit"><i class="fa fa-times"></i></button></td>
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
