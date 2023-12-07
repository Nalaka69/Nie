<?php

use App\Http\Controllers\api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/programs', [ApiController::class, 'programsList']);
Route::get('/programs/{_date}', [ApiController::class, 'programsDateFiltered']);
Route::get('/program/{_id}', [ApiController::class, 'programSingle']);
