<div class="header_top"><!--header_top-->
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="contactinfo">
                    <ul class="nav nav-pills">
                        <li><a href="#"><i class="fa fa-phone"></i> +38 0505555555</a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i> email@mail.com</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="social-icons pull-right">
                    <ul class="nav navbar-nav">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!--/header_top-->

<div class="header-middle"><!--header-middle-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="logo pull-left">
                    <a href="index.html"><img src="assets/images/home/logo.png" alt="" /></a>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="shop-menu pull-right">
                    <ul class="nav navbar-nav">
                        <li><a href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i> Корзина</a></li>
                        <li><a href="{{route('cabinet')}}"><i class="fa fa-user"></i> Аккаунт</a></li>
                        @guest
                        <li><a href="{{route('login')}}"><i class="fa fa-lock"></i> Вход</a></li>
                        @endguest
                        @auth
                            @if(Auth::user()->isAdmin())
                                <li><a href="{{route('admin')}}"><i class="fa fa-edit"></i> Панель админимстратора</a></li>
                                @endif
                        <li><a href="{{route('get-logout')}}"><i class="fa fa-lock"></i> Віход</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!--/header-middle-->

<div class="header-bottom"><!--header-bottom-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="mainmenu pull-left">
                    <ul class="nav navbar-nav collapse navbar-collapse">
                        <li><a href="{{route('home')}}">Главная</a></li>
                        <li class="dropdown"><a href="#">Магазин<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="#">Каталог товаров</a></li>
                                <li><a href="{{route('cart')}}">Корзина</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Блог</a></li>
                        <li><a href="#">О магазине</a></li>
                        <li><a href="#">Контакты</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!--/header-bottom-->
