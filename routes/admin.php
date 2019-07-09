<?php

Auth::routes();

//Route::resource('magazines', 'MagazineController', ['only' => ['index', 'show']]);

Route::group(['middleware' => 'auth'], function () {

    require(__DIR__ . '/images.php');

    Route::get('/admin', [
        'as' => 'admin',
        'uses' => 'HomeController@index'
    ]);

    // Sidebar Web

    Route::resource('users', 'UserController');


    // Editions

    Route::resource('editions', 'EditionController');

    Route::get('editions/index/list-table', [
        'as' => 'editions.index.table',
        'uses' => 'EditionController@indexTable'
    ]);

    Route::delete('ediciones/cover/eliminar-portada/{id}', [
        'as' => 'delete.cover',
        'uses' => 'EditionController@deleteCover'
    ]);

    Route::delete('ediciones/pdf/eliminar-pdf/{id}', [
        'as' => 'delete.pdf',
        'uses' => 'EditionController@deletePdf'
    ]);

    Route::resource('images', 'ImageController');

    Route::resource('categories', 'CategoryController');

    Route::resource('sliders', 'SliderController');

    Route::resource('medias', 'MediaController');

    Route::resource('advertisments', 'AdvertismentController');

    // Gallery

    Route::resource('galleries', 'GalleryController');

    Route::get('galleries/configuracion/galerias', [
        'as' => 'galleries.config',
        'uses' => 'GalleryController@configuration'
    ]);

    Route::delete('galleries/delete', [
        'as' => 'galleries.destroy',
        'uses' => 'GalleryController@destroy'
    ]);

    Route::delete('galleries/{id}/empty', [
        'as' => 'galleries.empty',
        'uses' => 'GalleryController@empty'
    ]);

    Route::get('galleries/{id}/active', [
        'as' => 'galleries.active',
        'uses' => 'GalleryController@active'
    ]);

    Route::resource('comments', 'CommentController');

    Route::resource('likes', 'LikeController');

    Route::resource('noticias', 'NoticiaController');

    Route::resource('types', 'TypeController');

    Route::get('medias/create/present', [
        'as' => 'medias.create.present',
        'uses' => 'MediaController@createPresent'
    ]);

    Route::post('medias/upload/images', [
        'as' => 'medias.upload.images',
        'uses' => 'MediaController@uploadImages'
    ]);





});

