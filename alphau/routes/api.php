<?php

use App\Http\Controllers\api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/programs', [ApiController::class, 'programsList']);
Route::get('/programs/{_date}', [ApiController::class, 'programsDateFiltered']);
Route::get('/program/{_id}', [ApiController::class, 'programSingle']);
Route::get('/programs/archives', [ApiController::class, 'programArchivesList']);
Route::get('/programs/archive/programs', [ApiController::class, 'welcomeArchiveProgramsList']);

Route::post('/chat/student/store', [ApiController::class, 'storeStudentMessage']);
Route::get('/chat/student', [ApiController::class, 'listStudentChat']);
Route::post('/chat/admin/store', [ApiController::class, 'storeAdminReply']);
Route::get('/chat/admin', [ApiController::class, 'listAdminChat']);
