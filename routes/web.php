<?php

use App\Http\Controllers\AddStudentToGroup;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DiaryClientController;
use App\Http\Controllers\DiaryStudentController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\PostponedGroupController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\StudentController;
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

// Route::get('/', function () {
//     return view('courses.index');
// });


Route::resource('courses', CourseController::class);
Route::resource('groups', GroupController::class);
Route::get('trash-groups',[GroupController::class,'trashedGroup'])->name('groups.trashedGroup');
Route::post('groups/{id}/restore',[GroupController::class,'restore'])->name('groups.restore');

Route::resource('programs',ProgramController::class);
Route::resource('lectures', LectureController::class);
Route::resource('students',StudentController::class);
Route::get('trashed-students',[StudentController::class,'trashedStudent'])->name('students.trashedStudent');
Route::post('students/{id}/restore',[StudentController::class,'restore'])->name('students.restore');

Route::resource('student-diary',DiaryStudentController::class);
Route::resource('client-diary',DiaryClientController::class);

Route::get('postponed-student',[PostponedGroupController::class,'index'])->name('postponed.students.index');
Route::delete('postponed-student/{postponed_student}',[PostponedGroupController::class,'destroy'])->name('postponed.students.destroy');

Route::get('addstudenttogroup/{group}',[AddStudentToGroup::class,'index'])->name('add.student.group.index');
Route::put('addstudenttogroup',[AddStudentToGroup::class,'update'])->name('add.student.group.update');
Route::delete('deletestudentfromgroup',[AddStudentToGroup::class,'destroy'])->name('add.student.group.destroy');

