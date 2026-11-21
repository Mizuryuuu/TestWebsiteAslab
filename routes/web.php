<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('zip.index');
});

Route::get('/multiuploads', 'ZipUploadController@uploadForm');
Route::post('/multiuploads', 'ZipUploadController@uploadSubmit');
