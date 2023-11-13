<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\automation\AutomationController;
use App\Http\Controllers\admin\day_archive\DayArchiveController;
use App\Http\Controllers\admin\LeftController;
use App\Http\Controllers\admin\play\PlayController;
use App\Http\Controllers\admin\program\ProgramController;
use App\Http\Controllers\admin\RightController;
use App\Http\Controllers\admin\users\SchoolController;
use App\Http\Controllers\admin\users\UserController;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [BaseController::class, 'index'])->name('index');
Route::get('/about-us', [BaseController::class, 'about'])->name('about-us');

Auth::routes();

// Route::middleware(['auth', 'user-access:user'])->group(function () {
//     Route::get('/', [BaseController::class, 'index'])->name('index');
// });

// Route::middleware(['auth', 'user-access:admin'])->group(function () {
Route::get('/admin', [AdminController::class, 'cHome'])->name('admin');
// });

// admin right routes
Route::get('/admin/dashboard', [RightController::class, 'cRHome'])->name('c_ad_r_home');
Route::get('/admin/users', [RightController::class, 'cRUsers'])->name('c_ad_r_users');
Route::post('/admin/users/store', [UserController::class, 'storeUser'])->name('user.store');
Route::get('/admin/schools', [RightController::class, 'cRSchools'])->name('c_ad_r_schools');
Route::post('/admin/schools/store', [SchoolController::class, 'storeSchool'])->name('school.store');
Route::get('/admin/notifications', [RightController::class, 'cRNotifications'])->name('c_ad_r_notifications');
Route::get('/admin/programs', [LeftController::class, 'cLPrograms'])->name('c_ad_l_programs');
Route::get('/admin/day-archive', [LeftController::class, 'cLDayPlaylist'])->name('c_ad_l_c_day_archive');
Route::post('/admin/day-archive/store', [DayArchiveController::class, 'storeDayArchive'])->name('day_archive.store');
Route::post('/admin/archive/store', [ProgramController::class, 'storeArchive'])->name('archive.store');
Route::get('/admin/programs/add', [LeftController::class, 'cLProgramsArchive'])->name('c_ad_l_program_archive');
Route::post('/admin/programs/store', [ProgramController::class, 'storeProgram'])->name('program.store');
Route::get('/admin/automation', [LeftController::class, 'cLHome'])->name('c_ad_l_home');
Route::post('/admin/automation/store', [AutomationController::class, 'storeAutomation'])->name('automation.store');
Route::get('/admin/automation/bat', [AutomationController::class, 'executeBatchFile'])->name('start.bat');
Route::get('/admin/automation/list', [AutomationController::class, 'listAutomations'])->name('automation.list');
// Route::get('/admin/play_status/show', [PlayController::class, 'showStatus'])->name('current_status.show');
Route::put('/admin/play_status/change', [PlayController::class, 'changeStatus'])->name('current_status.change');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
