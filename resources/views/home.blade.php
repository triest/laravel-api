@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Events Api') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p>Ваш токен:
                            {{$user->api_token}}
                        </p>
                        <p>
                            Получть все события:
                            <b>GET:</b> {{route('events.getall')}}?api_token={{$user->api_token}}
                        </p>
                        <p>
                            Получть одно событие:
                            <b>GET:</b> {{route('events.one',['id'=>1])}}?api_token={{$user->api_token}}
                        </p>

                        <p>
                            Получть пользователей, записавшихся на событие:
                            <b>GET:</b> {{route('events.users',['id'=>1])}}?api_token={{$user->api_token}}
                        </p>
                        <p>
                            Добавить пользователя:
                            <b>PUT:</b> {{route('events.addUser',['id'=>1,'userid'=>1])}}?api_token={{$user->api_token}}
                        </p>
                        <p>
                            Удалить пользователя:
                            <b>DELETE:</b> {{route('events.deleteUser',['id'=>1,'userid'=>1])}}
                            ?api_token={{$user->api_token}}
                        </p>

                        <p>
                            Получить список пользоватлей:
                            <b>GET:</b> {{route('users.list')}}?api_token={{$user->api_token}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
