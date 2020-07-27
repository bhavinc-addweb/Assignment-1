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

Route::POST('/game', function () {
    return view('game');
});

Auth::routes();

Route::get('/Laramap', 'MapController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/newGame', 'HomeController@newGame');

Route::post('/tic_tac', 'tic_taccontroller@index');

Route::get('/board/{id}', 'GameController@board');

Route::post('/play/{id}', 'GameController@play');

Route::post('/game-over/{id}', 'GameController@gameOver');
