<?php

    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

    Route::get('/', function () {
        return view('welcome');
    });
    Route::prefix('events')->group(
            function () {
                Route::get('', 'EventsController@index');
                Route::get('{id}', 'EventsController@show');
                Route::post('', 'EventsController@store');
                Route::put('{id}', 'EventsController@update');
                Route::delete('{id}', 'EventsController@delete');

                
            }
    );


    Route::prefix('users')->group(
            function () {
                Route::get('', 'UsersController@index');
                Route::get('{id}', 'UsersController@show');
                Route::post('', 'UsersController@store');
                Route::put('{id}', 'UsersController@update');
                Route::delete('{id}', 'UsersController@delete');
            }
    );