<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Mail\NewJobNotification;
use App\Models\Application;
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
Route::post('/jobs/{job}/apply', [ApplicationController::class, 'store'])->name('jobs.apply');

Route::post('/addCv', [CvController::class, 'store'])->name('cv.add');
Route::get('/cv', [CvController::class, 'create'])->name('cv.index');
Route::get('/cv/edit', [CvController::class, 'edit'])->name('cv.edit');
Route::put('/cv/update', [CvController::class, 'update'])->name('cv.update');

Route::post('/company/review/{id}', [ReviewController::class, 'store'])->name('review.add');

Route::get('/signOut', [ProfileController::class,'signOut']);
Route::get('/viewprofile/{user}',[ProfileController::class, 'viewCompanyofId'])->name('view.company');
Route::get('/viewprofile', [ProfileController::class,'showProfile'])->name('profile.view');
Route::get('/viewprofile/saved', [JobController::class,'showSaved'])->name('saved.view');
Route::get('/editCompany', [ProfileController::class,'companyProfile'])->name('company.edit');
Route::post('/saveprofile', [ProfileController::class,'storeCompany'])->name('company.save');

Route::get('/posts', [JobController::class, 'companyPosts'])->name('posts.show');
Route::get('/posts/{post}', [ApplicationController::class, 'postApplicants'])->name('applicants.show');
Route::post('/posts/{post}/filter', [ApplicationController::class, 'filter'])->name('applicants.filter');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';