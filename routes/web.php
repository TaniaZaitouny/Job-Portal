<?php

use App\Http\Controllers\CvController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Mail\NewJobNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

// Route::get('/', function () {
//     return view('home');
// })->name('index');

Route::get('/', [JobController::class, 'jobs_per_category'])->name('index');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::resource('jobs', JobController::class);

Route::get('jobs/category/{name}',[JobController::class, 'display_category'])->name('jobs.category');

Route::post('/jobs/search', [JobController::class, 'search'])->name('jobs.search');
Route::post('/jobs/search/save', [SearchController::class, 'store'])->name('search.save');
Route::post('/jobs/{job}/save', [JobController::class, 'save'])->name('jobs.save');

Route::post('/addCv', [CvController::class, 'store']);
Route::get('/cv', function () {
  return view('cv');});



Route::post('/company/review/{id}', [ReviewController::class, 'store'])->name('review.add');
Route::get('/company', function() {
    return view('companyProfile');
});
Route::get('/signOut',[ProfileController::class,'signOut']);
Route::get('/Profile',[ProfileController::class,'showProfile']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';