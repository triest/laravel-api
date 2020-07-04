@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

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
                            Запросы:
                            Получть все события:
                            GET: {{route('events.getall')}}?api_token={{$user->api_token}}
                        </p>
                        <p>
                            Получть одно событие:
                            GET: {{route('events.one',['id'=>1])}}?api_token={{$user->api_token}}
                        </p>

                            <p>
                                Получть пользователей, записавшихся на событие:
                                GET: {{route('events.users',['id'=>1])}}?api_token={{$user->api_token}}
                            </p>
                        <p>
                            Добавить пользователя:
                            PUT: {{route('events.addUser',['id'=>1])}}?api_token={{$user->api_token}}?user_id=1
                        </p>
                            <p>
                                Удалить пользователя:
                                PUT: {{route('events.addUser',['id'=>1])}}?api_token={{$user->api_token}}?user_id=1
                            </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
