<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('hide-route')->group(function () {
    Route::get('/test', function () {
        return '<h1>test</h1>';
    });
});