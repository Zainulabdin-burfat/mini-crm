<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Mail\MailtrapExample;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/send-mail', function () {

//     Mail::to('panhjicar@gmail.com')->send(new MailtrapExample());

//     return 'A message has been sent to Mailtrap!';

// });

Auth::routes();
Route::get('{any}', function () {
    return view('layouts/app');
})->where('any', '.*');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
