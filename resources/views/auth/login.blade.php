@extends('layouts.site')

@section('title', 'Логин')

@section('header')
    @include('site.header')
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-4 col-sm-offset-4 padding-right">


                    <ul>

                        <li></li>

                    </ul>


                    <div class="signup-form"><!--sign up form-->
                        <h2>Вход на сайт</h2>
                        <form action="{{route('login')}}" method="post">
                            <input type="email" name="email" placeholder="E-mail" value=""/>
                            <input type="password" name="password" placeholder="Пароль" value=""/>
                            <input type="submit" name="submit" class="btn btn-default" value="Вход" />
                            @csrf
                        </form>
                    </div><!--/sign up form-->


                    <br/>
                    <br/>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    @include('site.footer')
@endsection
