<?php

use App\Http\Controllers\ProfessorController;
use App\Models\Student;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin');
});
//Student Routes
Route::resource('students', StudentController::class);
Route::get('students/trash/',[StudentController::class, 'trash'])->name('students.trash');
Route::get('students/restore/{id}',[StudentController::class, 'restore'])->name('students.restore');
Route::get('/students/{id}/trash', [StudentController::class, 'trash'])->name('students.trash');

Route::post('/students/{student}/courses', [StudentController::class, 'addCourse'])->name('students.addCourse');
Route::delete('/students/{student}/courses/{course}', [StudentController::class, 'removeCourse'])->name('students.removeCourse');


// Course Routes
Route::resource('courses', CourseController::class);
Route::get('courses/trash/',[CourseController::class, 'trash'])->name('courses.trash');
Route::get('courses/{id}/trash', [CourseController::class, 'trash'])->name('courses.trash');
Route::get('courses/restore/{id}', [CourseController::class, 'restore'])->name('courses.restore');

// Professor Routes
Route::resource('professors', ProfessorController::class);
Route::get('professors/trash/',[ProfessorController::class, 'trash'])->name('professors.trash');
Route::get('professors/{id}/trash', [ProfessorController::class, 'trash'])->name('professors.trash');
Route::get('professors/restore/{id}', [ProfessorController::class, 'restore'])->name('professors.restore');