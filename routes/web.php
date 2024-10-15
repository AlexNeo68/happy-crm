<?php

use App\Http\Controllers\Appointment\AppointmentController;
use App\Http\Controllers\Message\MessageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';

Route::get('/users/{user}/message', [MessageController::class, 'show']);
Route::post('/users/{user}/message', [MessageController::class, 'submit']);

Route::get('/users/{user}/appointment', [AppointmentController::class, 'show']);
Route::post('/users/{user}/appointment', [AppointmentController::class, 'submit']);


