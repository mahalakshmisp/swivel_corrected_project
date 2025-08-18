<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FreelancingController;
// Route::get('/', function () {
//     return view('index');
// });

Route::redirect('/dashboard', '/')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

use App\Http\Controllers\VideoController;
use App\Http\Controllers\CourseController;
use Illuminate\Http\Request;

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [FreelancingController::class, 'showmain']);
Route::get('/livecatagories', [FreelancingController::class, 'livecatagories']);
Route::get('/videocatagories', [FreelancingController::class, 'videocatagories']);
Route::get('/bronze', [FreelancingController::class, 'bronze']);
Route::get('/bronze_details', [FreelancingController::class, 'bronze_details']);
Route::get('/silver', [FreelancingController::class, 'silver']);
Route::get('/silver_details', [FreelancingController::class, 'silver_details']);
Route::get('/gold', [FreelancingController::class, 'gold']);
Route::get('/gold_details', [FreelancingController::class, 'gold_details']);
Route::get('/diamond', [FreelancingController::class, 'diamond']);
Route::get('/diamond_details', [FreelancingController::class, 'diamond_details']);
Route::get('/form', [FreelancingController::class, 'form']);
Route::post('/formdata', [FreelancingController::class, 'formdata'])->middleware('auth');
Route::get('/details', [FreelancingController::class, 'showRegistrations']);
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{id}/upload', [CourseController::class, 'uploadForm'])->name('courses.uploadForm');
Route::post('/courses/{id}/upload', [CourseController::class, 'uploadVideos'])->name('courses.uploadVideos');
Route::get('/courses/{id}', [CourseController::class, 'show'])
    ->whereNumber('id')
    ->name('courses.show.id');
Route::get('/courses/{slug}', [CourseController::class, 'showBySlug'])->name('courses.show');
Route::get('/general/upload', [CourseController::class, 'generalUploadForm'])->name('general.uploadForm');
Route::post('/general/upload', [CourseController::class, 'generalUploadVideos'])->name('general.uploadVideos');
Route::get('/purchase/{video}', [CourseController::class, 'purchasePage'])->name('video.purchase')->middleware('auth');
Route::post('/purchase/{video}', [CourseController::class, 'storePurchase'])->name('video.purchase.store')->middleware('auth');

// Secure video streaming for purchased videos
Route::get('/video/stream/{video}', [CourseController::class, 'stream'])->name('video.stream')->middleware('auth');

require __DIR__ . '/video_routes.php';

Route::get('/login/redirect', function (Request $request) {
    $to = $request->query('to', url()->previous());
    session(['url.intended' => $to]);
    return redirect()->route('login');
})->name('login.redirect');

Route::get('/register/redirect', function (Request $request) {
    $to = $request->query('to', url()->previous());
    session(['url.intended' => $to]);
    return redirect()->route('register');
})->name('register.redirect');

require __DIR__ . '/auth.php';
