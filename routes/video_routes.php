<?php

// routes/video_routes.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
Route ::get('/videos/aari',[VideoController::class,'aari']);
Route ::get('/videos/abacus',[VideoController::class,'abacus']);
Route ::get('/videos/baking',[VideoController::class,'baking']);
Route ::get('/videos/beautician',[VideoController::class,'beautician']);
Route ::get('/videos/car',[VideoController::class,'car']);
Route ::get('/videos/dm',[VideoController::class,'dm']);
Route ::get('/videos/exam',[VideoController::class,'exam']);
Route ::get('/videos/fashion',[VideoController::class,'fashion']);
Route ::get('/videos/fittness',[VideoController::class,'fittness']);
Route ::get('/videos/mobile',[VideoController::class,'mobile']);
Route ::get('/videos/music',[VideoController::class,'music']);
Route ::get('/videos/photo',[VideoController::class,'photo']);
Route ::get('/videos/school',[VideoController::class,'school']);
Route ::get('/videos/tailoring',[VideoController::class,'tailoring']);
Route ::get('/videos/web',[VideoController::class,'web']);
Route ::get('/classes/sixth',[VideoController::class,'sixth']);
Route ::get('/classes/seventh',[VideoController::class,'seventh']);
Route ::get('/classes/eight',[VideoController::class,'eight']);
Route ::get('/classes/ninenth',[VideoController::class,'ninenth']);
Route ::get('/classes/tenth',[VideoController::class,'tenth']);
Route ::get('/classes/eleventh',[VideoController::class,'eleventh']);
Route ::get('/classes/twelth',[VideoController::class,'twelth']);





