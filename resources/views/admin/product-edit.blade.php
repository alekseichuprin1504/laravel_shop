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
                    <li><a href="{{route('products.index')}}">Управление товарами</a></li>
                    <li class="active">Редактировать товар</li>
                </ol>
            </div>


            <h4>Редактировать товар #</h4>
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

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="{{route('products.update', $product)}}" method="post" enctype="multipart/form-data">

                        <p>Название товара</p>
                        <input type="text" name="name" placeholder="" value="{{$product->name}}">

                        <p>Slug</p>
                        <input type="text" name="slug" placeholder="" value="{{$product->slug}}">

                        <p>Категория</p>
                        <select name="category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                    @isset($product)
                                        @if($product->category_id == $category->id)
                                            selected
                                            @endif
                                    @endisset
                                >{{$category->name}}</option>
                            @endforeach
                        </select>
                        <br/><br/>

                        <p>Код</p>
                        <input type="text" name="code" placeholder="" value="{{$product->code}}">

                        <p>Количество</p>
                        <input type="text" name="count" placeholder="" value="{{$product->count}}">

                        <p>Стоимость, $</p>
                        <input type="text" name="price" placeholder="" value="{{$product->price}}">

                        <p>Изображение товара</p>
                        <img src="{{asset('assets/images/home/'.$product->image)}}" width="200" alt="" />
                        <input type="file" name="image" placeholder="" value="">
                        <input type="hidden" name="old_image" value="{{$product->image}}">

                        <p>Детальное описание</p>
                        <textarea name="description">{{$product->description}}</textarea>

                        <br/><br/>

                        <p>Рекомендуемые</p>
                        <select name="is_reccomended">
                            <option value="1" >Да</option>
                            <option value="0" >Нет</option>
                        </select>

                        <br/><br/>

                        <p>Новинка</p>
                        <select name="new">
                            <option value="1" >Да</option>
                            <option value="0" >Нет</option>
                        </select>

                        <br/><br/>
                        <p>Хит</p>
                        <select name="hit">
                            <option value="1" >Да</option>
                            <option value="0" >Нет</option>
                        </select>

                        <br/><br/>
                        <p>Статус</p>
                        <select name="status">
                            <option value="1" >Отображается</option>
                            <option value="0" >Скрыт</option>
                        </select>

                        <br/><br/>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                        <br/><br/>
                        @csrf
                        @method('PUT')
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
@section('footer')
    @include('site.footer')
@endsection
