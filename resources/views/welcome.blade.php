@extends('layouts.app')

@section('content')

    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="content">

            <div class="links">
                Войдите или зарегистрируйтесь для доступа к API.

                <a class="links" href="{{route('home')}}"> Описание API доступно по этой ссылке</a>
            </div>
        </div>
    </div>
@endsection