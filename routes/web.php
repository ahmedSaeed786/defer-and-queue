<?php

use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Concurrency;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/defer', function () {
    $user = User::create([
        'name' => "Name1",
        'email' => "email1",
        'password' => Hash::make('sdf')
    ]);

    // Deferred task
    defer(function () use ($user) {

        // This runs AFTER response

        \Log::info('Deferred task running');

        \Log::info('Welcome email sent to: ' . $user->email);

        sleep(5);

        \Log::info('Finished deferred task');
    });
    return $user;
});



Route::Get('user', [EmailController::class, 'sendEmail']);
