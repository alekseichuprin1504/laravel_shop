@extends('layouts.site')

@section('header')
    @include('site.header')
@endsection

@section('content')
    <section>
        <div class="container" align="center">
            <div class="row">


                <div class="col-sm-9 padding-right">
                    <div class="features_items">
                        <h2 class="title text-center">Корзина</h2>



                        <p>Заказ оформлен. Мы Вам перезвоним.</p>


                        <p>Выбрано товаров: {{$order->countGoods()}}, на сумму: , {{$order->calculateForSum()}} $</p><br/>



                        <div class="col-sm-4">

                            <ul>

                                <li> -</li>

                            </ul>


                            <p>Для оформления заказа заполните форму. Наш менеджер свяжется с Вами.</p>

                            <div class="login-form">
                                <form action="{{route('cart-confirm')}}" method="post">

                                    <p>Ваше имя</p>
                                    <input type="text" name="name" placeholder="" value=""/>

                                    <p>Номер телефона</p>
                                    <input type="text" name="phone" placeholder="" value=""/>

                                    <p>Комментарий к заказу</p>
                                    <input type="text" name="comment" placeholder="Сообщение" value=""/>

                                    <br/>
                                    <br/>
                                    <input type="submit" name="submit" class="btn btn-default" value="Оформить" />
                                    @csrf
                                </form>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </section>
    @endsection

@section('footer')
    @include('site.footer')
@endsection
