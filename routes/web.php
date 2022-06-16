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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('new-ticket', 'TicketsController@create');

Route::post('new-ticket', 'TicketsController@store');

Route::get('my_tickets', 'TicketsController@userTickets');

Route::get('tickets/{ticket_id}', 'TicketsController@show');

Route::post('comment', 'CommentsController@postComment');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function (){

    Route::get('tickets', 'TicketsController@index');

    Route::post('close_ticket/{ticket_id}', 'TicketsController@close');

    Route::post('delete_ticket/{ticket_id}', 'TicketsController@delete');

    Route::get('categories', 'CategoryController@index');

    Route::get('new-category', 'CategoryController@create');

    Route::post('new-category', 'CategoryController@store');

    Route::get('category/{id}', 'CategoryController@edit');

    Route::delete('delete_category/{category_id}', 'CategoryController@delete');

    Route::get('users', 'UserController@index');

    Route::get('new-user', 'UserController@create');

    Route::post('new-user', 'UserController@store');

    Route::post('delete_user/{user_id}', 'UserController@delete');

    Route::get('projets', 'ProjetController@index');

    Route::get('new-projet', 'ProjetController@create');

    Route::post('new-projet', 'ProjetController@store');

    Route::post('delete_projet/{projet_id}', 'ProjetController@delete');

});

Route::group(['prefix' => 'dev', 'middleware' => 'dev'], function (){

    Route::get('tickets', 'TicketsController@index');

    Route::post('close_ticket/{ticket_id}', 'TicketsController@close');

    Route::post('delete_ticket/{ticket_id}', 'TicketsController@delete');

    Route::get('projets', 'ProjetController@index');

    Route::get('new-projet', 'ProjetController@create');

    Route::post('new-projet', 'ProjetController@store');

    Route::post('delete_projet/{projet_id}', 'ProjetController@delete');

});

Route::get('projets/{projet_id}', 'ProjetController@show');


