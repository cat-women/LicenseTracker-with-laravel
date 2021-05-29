<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('front.about.about');
});


Route::get('/help', function () {
    return view('front.help.help');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::get('/registration/addRecord/{id}', [RegistrationController::class, 'addRecord'])->name('registration.addRecord');
Route::post('/registration/updateRecord/{registration}', [RegistrationController::class, 'updateRecord'])->name('registration.updateRecord');

Route::resource('/registration', RegistrationController::class);
Route::resource('/message', MessageController::class);
Route::resource('/payment', PaymentController::class);



Route::get('/test', function () {
    return 'helo ';
});

Route::post('/search', [HomeController::class, 'search']);


require __DIR__.'/auth.php';
