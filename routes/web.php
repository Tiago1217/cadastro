<?php

use Illuminate\Support\Facades\Route;

Route::get('/filmes', function () {
    return view('filmes');
});
