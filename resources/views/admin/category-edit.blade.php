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
                    <li><a href="#">Админпанель</a></li>
                    <li><a href="#">Управление категориями</a></li>
                    <li class="active">Редактировать категорию</li>
                </ol>
            </div>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li> - {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h4>Редактировать категорию "{{$category->name}}"</h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="{{route('categories.update', $category)}}" method="post">
                        @csrf
                        @method('PUT')
                        <p>Название</p>
                        <input type="text" name="name" placeholder="" value="{{$category->name}}">

                        <p>Статус</p>
                        <select name="status">
                            <option value="1" >Отображается</option>
                            <option value="0" >Скрыта</option>
                        </select>

                        <br><br>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
