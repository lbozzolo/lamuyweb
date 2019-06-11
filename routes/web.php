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

require(__DIR__ . '/admin.php');
require(__DIR__ . '/api.php');

Route::get('/', function () {
  return redirect('home');
});

Route::get('home', function () {
    return redirect('web');
});


Route::group(['prefix' => 'web'], function () {

    Route::get('/', [
        'as' => 'home',
        'uses' => 'WebController@index'
    ]);

    Route::get('past', [
        'as' => 'pictures.past',
        'uses' => 'WebController@past'
    ]);

    Route::get('/present', [
        'as' => 'pictures.present',
        'uses' => 'WebController@present'
    ]);

    Route::get('/works', [
        'as' => 'works',
        'uses' => 'WebController@works'
    ]);

    Route::post('/enviar-datos', [
        'as' => 'send.data.applicant',
        'uses' => 'WebController@sendDataApplicant'
    ]);


    Route::get('/home', 'WebController@index');

});




