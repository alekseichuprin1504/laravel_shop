<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
            <div class="left-sidebar">
                <h2>Каталог</h2>
                <div class="panel-group category-products">

                    @foreach($categories as $category_name)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a href="/category/{{$category_name->slug}}"
                                @if($category->slug === $category_name->slug) class="active"
                                    @endif>{{$category_name->name}}</a></h4>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Категория - {{$category->name}}</h2>
                    @if(count($category->products) > 0 )
                    @foreach($category->products as $product)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{asset('assets/images/home/'.$product->image)}}" alt="" />
                                        <a href="{{ route('product', ['id' => $product->id]) }}"><h3>{{$product->name}}</h3></a>
                                        <p>{{$product->price}} грн.</p>
                                        @if($product->isAvailable())
                                        <form method="post" action="{{route('cart-add', ['id' => $product->id])}}">
                                        <button type="submit" class="fa fa-shopping-cart">В корзину</button>
                                            @csrf
                                        </form>
                                        @else
                                        Net
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @else
                        <p>Товаров данной категории нет</p>
                        <p><a href="{{route('home')}}">Назад</a></p>
                        @endif
                </div><!--features_items-->

            </div>
        </div>
    </div>
</section>

