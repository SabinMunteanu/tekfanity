<?php

use Illuminate\Support\Facades\Route;

Route::get('/index', function () {return view('index');});
Route::get('/', function () {
    return view('welcome');
});
