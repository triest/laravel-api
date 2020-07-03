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
    Route::prefix('events')->name('events.')->group(
            function () {
                Route::get('', 'EventsController@index')->name('getall');
                Route::get('{id}', 'EventsController@show');
                Route::get('{id}/users', 'EventsController@showUsers');
                //     Route::post('', 'EventsController@store');
                //    Route::put('{id}', 'EventsController@update');
                Route::put('{id}/users', 'EventsController@addUser');
                Route::delete('{id}/users/{userid}', 'EventsController@deleteUser');


            }
    );
    Route::prefix('test')->middleware('auth:api')->group(
            function () {
                Route::get('{id}', 'EventsController@test');
            }
    );

    Route::prefix('users')->middleware('auth:api')->group(
            function () {
                Route::get('', 'UsersController@index');
                Route::get('{id}', 'UsersController@show');
            }
    );
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
