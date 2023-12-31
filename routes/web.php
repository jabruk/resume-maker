<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProjectController;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('resume', ResumeController::class);
    Route::resource('project', ProjectController::class);

    Route::post('/image', [ImageController::class,'update'])->name('image.update');
    Route::post('/contact/submit', [ContactController::class, 'submit']);
    Route::post('/contact/submit', function (Request $request){
        Mail::to(Auth::user()->email)->send(new ContactMail($request->name,$request->email,$request->message));

    });
   
});


// Route::get('/resume', [ResumeController::class, 'edit'])->name('resume.edit');
// Route::patch('/resume', [ResumeController::class, 'update'])->name('resume.update');

require __DIR__.'/auth.php';
