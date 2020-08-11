<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        @foreach($categories as $category)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="/category/{{$category->slug}}">{{$category->name}}</a></h4>
                                </div>
                            </div>
                        @endforeach
                    </div><!--/category-products-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="row">
                        <div class="col-sm-5">

                            <div class="view-product">
                                <img src="{{asset('assets/images/product-details/'.$product->image)}}" alt="" />
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <img src="" class="newarrival" alt="" />
                                <h2>{{$product->name}}</h2>
                                <p>Категория - {{$product->category->name}}</p>
                                <span>
                                            <span>US ${{$product->price}}</span>

                                    <form action="{{route('cart-add', ['id' => $product->id])}}" method="POST">
                                        @if($product->isAvailable())
                                            <button type="submit" class="btn btn-fefault cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                В корзину
                                            </button>
                                        @csrf
                                        </form>
                                        </span>


                                <p><b>Наличие:</b> На складе</p>
                                <p><b>Состояние:</b> Новое</p>
                                <p><b>Производитель:</b> D&amp;G</p>
                                @else
                                    <p><b>Наличие:</b> Нет На складе</p>
                                    <p><b>Состояние:</b> Новое</p>
                                    <p><b>Производитель:</b> D&amp;G</p>
                                @endif
                            </div><!--/product-information-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h5>Описание товара</h5>
                            {{$product->description}}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <h5>Лейблы</h5>
                            @if($product->isNew())
                                <span class="badge badge-success">Новинка</span>
                            @endif
                            @if($product->isHit())
                                <span class="badge badge-danger">Хит продаж</span>
                            @endif
                            @if($product->isReccomended())
                                <span class="badge badge-warning">Рекомендуемые</span>
                            @endif
                        </div>
                    </div>
                </div><!--/product-details-->

            </div>
        </div>
    </div>
</section>
