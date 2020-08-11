<section>
    <div class="container">
        <div class="row">


            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Корзина</h2>

                    @if(session()->has('success'))
                        <p class="alert alert-success">{{session()->get('success')}}</p>
                    @endif
                    @if(session()->has('warning'))
                        <p class="alert alert-warning">{{session()->get('warning')}}</p>
                    @endif
                    @if($orderId && (count($order->products)) > 0)
                    <p>Вы выбрали такие товары:</p>
                    <table class="table-bordered table-striped table">
                        <tr>
                            <th>Код товара</th>
                            <th>Название</th>
                            <th>Количество, шт</th>
                            <th>Цена, $</th>
                            <th>Стомость, $</th>
                            <th>Удалить</th>
                        </tr>

                            @foreach($order->products as $product)
                            <tr>
                            <td>{{$product->code}}</td>
                            <td>
                                <a href="{{ route('product', ['id' => $product->id]) }}">{{$product->name}}</a>
                            </td>
                                <td>
                                    <div class="btn-group form-inline">
                                    <span class="badge">{{$product->pivot->count}}</span>
                                    <form action="{{route('cart-add', ['id' => $product->id])}}" method="post">
                                        <button type="submit" class="btn btn-success" href=""><span
                                                class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                        @csrf
                                    </form>
                                    <form action="{{route('cart-delete', ['id' => $product->id])}}" method="post">
                                        <button type="submit" class="btn btn-danger" href=""><span
                                                class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                                        @csrf
                                    </form>
                                    </div>
                                </td>
                            <td>{{$product->price}}</td>
                                <td>{{$product->getPriceForCount()}}</td>


                            <td>
                                <a href="#">
                                    <i class="fa fa-times"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="5">Общая стоимость, $: - {{$order->getFullSum()}} грн</td>
                            <td></td>
                        </tr>

                    </table>

                    <a class="btn btn-default checkout" href="{{route('cart-checkout')}}"><i class="fa fa-shopping-cart"></i> Оформить заказ</a>
                    @else
                        <p><h5 class="title text-center">Корзина пустая</h5></p>
                    @endif
                    <a class="btn btn-default checkout" href="{{route('home')}}"><i class="fa fa-shopping-cart"></i> Вернуться к покупкам</a>


                </div>



            </div>
        </div>
    </div>
</section>
