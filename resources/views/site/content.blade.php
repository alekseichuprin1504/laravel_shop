<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">
                        @foreach($categories as $category)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="/category/{{$category->slug}}">{{$category->name}}</a></h4>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    @if(session()->has('success'))
                        <p class="alert alert-success">{{session()->get('success')}}</p>
                    @endif

                    @if(session()->has('warning'))
                        <p class="alert alert-warning">{{session()->get('warning')}}</p>
                    @endif
                    @if(Route::current()->getName() == 'search')
                        <h2 class="title text-center">Результаты поиска - "{{request()->get('search')}}"</h2>

                        <form method="GET" action="{{route('home')}}">
                                                <div class="filters row">
                                                    <div class="col-sm-6 col-md-3">
                                                        <label for="price_from">Цена от
                                                            <input type="text" name="price_from" id="price_from" size="6" value="{{request()->price_from}}">
                                                        </label>
                                                        <label for="price_to">До
                                                            <input type="text" name="price_to" id="price_to" size="6"  value="{{request()->price_to}}">
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-2 col-md-2">
                                                        <label for="hit">Хит
                                                            <input type="checkbox" name="hit" id="hit" @if(request()->has('hit')) checked
                                                            @endif
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-2 col-md-2">
                                                        <label for="new">Новинка
                                                            <input type="checkbox" name="new" id="new" @if(request()->has('new')) checked
                                                            @endif
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-2 col-md-2">
                                                        <label for="recommend">Рекомендуем
                                                            <input type="checkbox" name="is_reccomended" id="recommend" @if(request()->has('is_reccomended')) checked
                                                            @endif
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-6 col-md-3">
                                                        <button type="submit" class="btn btn-primary">Поиск</button>
                                                        <a href="{{route('home')}}" class="btn btn-danger">Сброс</a>
                                                    </div>
                                                </div>
                                            </form>
                    @endif
                        @if(Route::current()->getName() == 'home')

                    <h2 class="title text-center">Все товары</h2>
                    <form action="{{route('search')}}" method="post">
                        {{csrf_field()}}
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Поиск.." value="">
                            <span class="input-group-btn">
                        <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                    </span>
                        </div>
                    </form>
                    @endif
                    <br><br>
                    @foreach($products as $product)
                        <div class="col-sm-4">

                            <div class="product-image-wrapper">
                                @if($product->isNew())
                                    <span class="badge badge-success">Новинка</span>
                                @endif
                                @if($product->isHit())
                                    <span class="badge badge-danger">Хит продаж</span>
                                @endif
                                @if($product->isReccomended())
                                    <span class="badge badge-warning">Рекомендуемые</span>
                                @endif
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{asset('assets/images/home/'.$product->image)}}" alt="" />
                                        <a href="{{ route('product', ['id' => $product->id]) }}"><h3>{{$product->name}}</h3></a>
                                        <p>{{$product->price}} грн.</p>
                                        <form method="post" action="{{route('cart-add', ['id' => $product->id])}}">
                                            @if($product->isAvailable())
                                            <button type="submit" class="fa fa-shopping-cart">В корзину</button>
                                            @csrf
                                            @else
                                            Нет на складе
                                                @endif
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div><!--features_items-->
                {{ $products->links() }}
                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">Рекомендуемые товары</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">

                        @foreach($recomendProducts as $recomend)
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{asset('assets/images/home/'.$product->image)}}" alt="" />
                                                <h2>{{$recomend->price}}</h2>
                                                    <p>{{$recomend->name}}</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="item">

                                <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{asset('assets/images/home/'.$product->image)}}" alt="" />
                                                    <h2>{{$recomend->price}}</h2>
                                                    <p>{{$recomend->name}}</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div><!--/recommended_items-->

            </div>
        </div>
    </div>
</section>
