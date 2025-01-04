<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


// Project Management
Route::middleware(['auth'])->group(function () {
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
});

Route::middleware(['auth'])->post('/tasks/{id}/toggle', [TaskController::class, 'toggleStatus']);

///// Add Routes
Route::middleware(['auth'])->post('/user', [ProfileController::class, 'addUser']);
Route::middleware(['auth'])->post('/project', [ProjectController::class, 'addProject']);
Route::middleware(['auth'])->post('/task', [TaskController::class, 'addTask']);


//// Delete Routes
Route::middleware(['auth'])->delete('/user/{id}', [ProfileController::class, 'destroyUser']);
Route::middleware(['auth'])->delete('/project/{id}', [ProjectController::class, 'destroy']);
Route::middleware(['auth'])->delete('/task/{id}', [TaskController::class, 'destroy']);





// testing
Route::get('/test', function () {
    return view('test');
});
