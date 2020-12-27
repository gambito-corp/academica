<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
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

Route::get('/', HomeController::class)->name('home');
Route::get('cursos', function (){
    return 'aqui se mostrara los cursos';
})->name('course');
Route::get('cursos/{course}', function ($course){
    return 'aqui se mostrara la informacion del curso'. $course;
})->name('course.show');
Route::get('/test', [IndexController::class, 'test'])->name('ejemplo');
Route::get('imagen/{id}', [IndexController::class, 'getImage'])->name('image');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
