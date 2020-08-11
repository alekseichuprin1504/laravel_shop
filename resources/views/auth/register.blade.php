@extends('layouts.site')

@section('header')
    @include('site.header')
@endsection

@section('content')


    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-4 col-sm-offset-4 padding-right">




                    <ul>

                        <li> - </li>

                    </ul>


                    <div class="signup-form"><!--sign up form-->
                        <h2>Регистрация на сайте</h2>
                        <form action="{{route('register')}}" method="post">

                            <input type="text" name="name" placeholder="Имя" value=""/>
                            <input type="email" name="email" placeholder="E-mail" value=""/>
                            <input type="password" name="password" placeholder="Пароль" value=""/>
                            <input type="password" name="password_confirmation" placeholder="Повторите Пароль" value=""/>
                            <input type="submit" name="submit" class="btn btn-default" value="Регистрация" />
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
