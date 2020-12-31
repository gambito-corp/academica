<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Course\CoursesController;

//Courses Route
Route::get('/', [CoursesController::class, 'index'])->name('courses.index');
Route::get('/{course}', [CoursesController::class, 'show'])->name('courses.show');
