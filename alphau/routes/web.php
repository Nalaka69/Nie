<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\automation\AutomationController;
use App\Http\Controllers\admin\day_archive\DayArchiveController;
use App\Http\Controllers\admin\LeftController;
use App\Http\Controllers\admin\library\LibraryController;
use App\Http\Controllers\admin\play\PlayController;
use App\Http\Controllers\admin\program\GenreController;
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
Route::get('/programs', [BaseController::class, 'programs'])->name('welcome.programs');
Route::get('/programs/list', [BaseController::class, 'welcomeProgramsList'])->name('welcome.programs.list');
Route::get('/about-us', [BaseController::class, 'about'])->name('about-us');

Auth::routes();

// Route::middleware(['auth', 'user-access:user'])->group(function () {
//     Route::get('/', [BaseController::class, 'index'])->name('index');
// });

// Route::middleware(['auth', 'user-access:admin'])->group(function () {
Route::get('/admin', [AdminController::class, 'cHome'])->name('admin');
// });

// admin right routes
Route::get('/admin/dashboard', [RightController::class, 'viewRightHome'])->name('c_ad_r_home');
Route::get('/admin/users', [RightController::class, 'viewUsers'])->name('c_ad_r_users');
Route::post('/admin/users/store', [UserController::class, 'storeUser'])->name('user.store');
Route::get('/admin/schools', [RightController::class, 'viewSchools'])->name('c_ad_r_schools');
Route::post('/admin/schools/store', [SchoolController::class, 'storeSchool'])->name('school.store');
Route::get('/admin/notifications', [RightController::class, 'viewNotifications'])->name('c_ad_r_notifications');

Route::get('/admin/genres', [LeftController::class, 'viewGenres'])->name('c_ad_l_genres');
Route::get('/admin/genres/list', [GenreController::class, 'listGenres'])->name('genre.list');
Route::post('/admin/genres/store', [GenreController::class, 'storeGenre'])->name('genre.store');
Route::post('/admin/genres/delete', [GenreController::class, 'deleteGenre'])->name('genre.delete');

Route::get('/admin/programs', [LeftController::class, 'viewPrograms'])->name('c_ad_l_programs');
Route::get('/admin/programs/list', [ProgramController::class, 'listArchives'])->name('archive.list');
Route::post('/admin/programs/store', [ProgramController::class, 'storeArchive'])->name('archive.store');
Route::post('/admin/programs/delete', [ProgramController::class, 'deleteArchive'])->name('archive.delete');

Route::get('/admin/programs-archive', [LeftController::class, 'viewProgramsArchive'])->name('c_ad_l_program_archive');
Route::get('/admin/programs-archive/list', [ProgramController::class, 'listPrograms'])->name('program.list');
Route::post('/admin/programs-archive/store', [ProgramController::class, 'storeProgram'])->name('program.store');
Route::post('/admin/programs-archive/delete', [ProgramController::class, 'deleteProgram'])->name('program.delete');
Route::get('/admin/programs-archive/episode', [ProgramController::class, 'getEpisodes'])->name('episode.get');

Route::get('/admin/library', [LeftController::class, 'viewLibrary'])->name('c_ad_l_c_library');
Route::get('/admin/library/list', [LibraryController::class, 'listLibraries'])->name('library.list');
Route::post('/admin/library/store', [LibraryController::class, 'storeLibrary'])->name('library.store');
Route::post('/admin/library/delete', [LibraryController::class, 'deleteLibrary'])->name('library.delete');

Route::get('/admin/day-archive', [LeftController::class, 'viewDayPlaylist'])->name('c_ad_l_c_day_archive');
Route::get('/admin/day-archive/list', [DayArchiveController::class, 'listDayArchives'])->name('day_archive.list');
Route::post('/admin/day-archive/store', [DayArchiveController::class, 'storeDayArchive'])->name('day_archive.store');
Route::post('/admin/day-archive/delete', [DayArchiveController::class, 'deleteDayArchive'])->name('day_archive.delete');

Route::get('/admin/automation', [LeftController::class, 'viewLeftHome'])->name('c_ad_l_home');
Route::get('/admin/automation/list', [AutomationController::class, 'listAutomations'])->name('automation.list');
Route::post('/admin/automation/store', [AutomationController::class, 'storeAutomation'])->name('automation.store');
Route::post('/admin/automation/delete', [AutomationController::class, 'deleteAutomation'])->name('automation.delete');
// Route::get('/admin/play_status/show', [PlayController::class, 'showStatus'])->name('current_status.show');

Route::put('/admin/play_status/change', [PlayController::class, 'changeStatus'])->name('current_status.change');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
