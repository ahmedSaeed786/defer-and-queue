<?php

use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Concurrency;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

Route::get('/', function () {
    return view('welcome');
});







Route::Get('user', [EmailController::class, 'sendEmail']);
Route::Get('Send-email', [EmailController::class, 'add']);
Route::Get('defer', [EmailController::class, 'defer']);
Route::Get('store', [EmailController::class, 'store']);
