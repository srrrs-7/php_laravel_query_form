<?php

use App\Http\Controllers\ContactsController;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('page1');
});

// contact endpoint
Route::get('/contact', [ContactsController::class, 'index'])->name("contact.index");
Route::post('/contact/confirm', [ContactsController::class, 'confirm']);
Route::get('/contact/confirm', [ContactsController::class, 'confirm'])->name("contact.confirm");
Route::post('/contact/send', [ContactsController::class, 'send']);
Route::post('/contact/send', [ContactsController::class, 'send'])->name("contact.send");