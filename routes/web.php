<?php

use App\Http\Controllers\PhoneController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PhoneController::class, 'index']);
