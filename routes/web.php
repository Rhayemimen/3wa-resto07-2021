<?php

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

Route::get('/', 'AppController@welcome')->name('welcome');
//ce name il va s'afficher dans le tableau (php artisan route:list);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('booking','BookingController')->middleware('auth');// meme si on veux entrer à la page par l'url on peux pas tant qu'il n'est pas authentifier
//c'est pour créer les 7 ressources