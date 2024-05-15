<?php

use App\Modules\Authentication\Controllers\VerifyRegisteredUserController;
use App\Modules\ContactForm\Controllers\ContactFormCreateController;
use App\Modules\HomePage\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomePageController::class, 'get', 'as' => 'home.get'])->name('home.get');
Route::post('/contact-post', [ContactFormCreateController::class, 'post', 'as' => 'contact.post'])->name('contact.post');

Route::prefix('/email/verify')->group(function () {
    Route::get('/{id}/{hash}', [VerifyRegisteredUserController::class, 'verify_email', 'as' => 'verify_email'])->name('verification.verify');
});