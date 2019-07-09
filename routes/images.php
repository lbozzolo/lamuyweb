<?php

// Imágenes

Route::get('imagenes/{file}', [
    'as' => 'imagenes.ver',
    'uses' => 'ImageController@verImage'
]);

Route::get('cover/{file}', [
    'as' => 'cover.ver',
    'uses' => 'ImageController@verCover'
]);

//    Route::get('pdf/{file}', [
//        'as' => 'pdf.ver',
//        'uses' => 'ImageController@verPdf'
//    ]);

Route::get('social&medias', [
    'as' => 'images.index',
    'uses' => 'ImageController@index'
]);

Route::post('imagenes/{id}/{class}', [
    'as' => 'images.save',
    'uses' => 'ImageController@storeImage'
]);

Route::post('imagenes/store', [
    'as' => 'images.store',
    'uses' => 'ImageController@store'
]);

Route::post('/{id}/{class}/demos/jquery-image-upload', [
    'as' => 'subir.imagen',
    'uses' => 'ImageController@saveJqueryImageUpload'
]);

Route::post('/{type}/demos/jquery-image-upload', [
    'as' => 'subir.imagen.sin.modelo',
    'uses' => 'ImageController@saveWithoutModel'
]);

Route::get('imagenes/{id}/{class}/{imagen}/principal', [
    'as' => 'images.main',
    'uses' => 'ImageController@principalImage',
]);

Route::get('sliders/{id}/activate', [
    'as' => 'sliders.activate',
    'uses' => 'SliderController@activate'
]);

Route::post('imagenes/subir-multiple', [
    'as' => 'images.subir.multiple',
    'uses' => 'ImageController@subirMultiple'
]);