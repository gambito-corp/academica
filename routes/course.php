<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Course\CoursesController;
use App\http\Livewire\Course\Status;

//Courses Route
Route::get('/', [CoursesController::class, 'index'])->name('courses.index');
Route::get('/{course}', [CoursesController::class, 'show'])->name('courses.show');
Route::post('/{course}/enrrolled', [CoursesController::class, 'enrrolled'])->middleware('auth')->name('courses.enrrolled');
Route::get('/status/{course}', Status::class)->middleware('auth')->name('courses.status');


