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
                    <li><a href="{{route('admin')}}">Админпанель</a></li>
                    <li><a href="{{route('categories.index')}}">Управление категориями</a></li>
                    <li class="active">Добавить категорию</li>
                </ol>
            </div>


            <h4>Добавить новую категорию</h4>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li> - {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <br/>

            <ul>

                <li> </li>

            </ul>


            <div class="col-lg-4">
                <div class="login-form">
                    <form action="{{route('categories.store')}}" method="post">
                        @csrf
                        <p>Название</p>
                        <input type="text" name="name" placeholder="" value="">
                        <p>Slag</p>
                        <input type="text" name="slug" placeholder="" value="">
                        <p>Статус</p>
                        <select name="status">
                            <option value="1" selected="selected">Отображается</option>
                            <option value="0">Скрыта</option>
                        </select>

                        <br><br>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>


        </div>
    </div>
</section>
