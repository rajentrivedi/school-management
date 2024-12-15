<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TeacherController;

Route::get('/', function () {
    return view('welcome');
});
