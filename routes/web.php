<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobController;
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

Route::get('/', function () {
    return view('home');
})->name('index');


Route::get('/jobposting', function () {
    return view('jobposting_form');
});

Route::resource('jobs', JobController::class)->except(['show', 'edit', 'update', 'destroy']);

Route::get('/jobdetails', function () {
    return view('jobdetails');
});

Route::get('/addCv', function () {
    return view('cv');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/companyProfile', function() {
    return view('companyProfile');
});


Route::get('/userProfile','App\Http\Controllers\UserController@showProfile');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

