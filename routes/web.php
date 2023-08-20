<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\UserController;

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
//searchCourse
Route::get('/searchCourse',[CourseController::class,'searchCourse'])->name('searchCourse');

//Audit
Route::get('/audits', [AuditController::class,'index']);
Route::get('/searchAudit',[AuditController::class,'searchAudit'])->name('searchAudit');

//profile
Route::get('/profile', [UserController::class,'auditLogHistory']);
//edit name
Route::get("/profile/editName", [UserController::class, 'passDataName'])->name("editName");
Route::post('/profile/editName', [UserController::class, 'saveName'])->name("saveName");
//edit email
Route::get("/profile/editEmail", [UserController::class, 'passDataEmail'])->name("editEmail");
Route::post('/profile/editEmail', [UserController::class, 'saveEmail'])->name("saveEmail");
//edit password
Route::get("/profile/editPassword", [UserController::class, 'passDataPassword'])->name("editPassword");
Route::post('/profile/editPassword', [UserController::class, 'savePassword'])->name("savePassword");

//pdf export
Route::get('downloadPDF/{course_id}', 'App\Http\Controllers\CourseController@downloadPDF')->name('downloadPDF');