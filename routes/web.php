<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AuditController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home',[CourseController::class,'showlist']);
Route::view('/createCourse','createCourse');
Route::view('/profile','profile');

Route::post("createCourse",[CourseController::class,'createCourse']);
//set name for the route, easy to reference in other parts
Route::get('/showCourse/{course_id}',[CourseController::class,'showCourse'])->name('showCourse');
Route::get('/editCourse/{course_id}',[CourseController::class,'passDataCourse'])->name('editCourse');
Route::put('/saveCourse/{course_id}',[CourseController::class,'saveCourse'])->name('saveCourse');
Route::get('/archiveCourse/{course_id}',[CourseController::class,'archiveCourse'])->name('archiveCourse');
Route::get('/showArchivedCourse',[CourseController::class,'showArchivedCourse'])->name('showArchivedCourse');
Route::get('/restoreCourse/{course_id}', [CourseController::class, 'restoreCourse'])->name('restoreCourse');

Route::get('/audits', [AuditController::class,'index']);

//searchCourse
Route::get('/searchCourse',[CourseController::class,'searchCourse'])->name('searchCourse');

//searchAudit
Route::get('/searchAudit',[AuditController::class,'searchAudit'])->name('searchAudit');