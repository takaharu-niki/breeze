<?php

use Illuminate\Support\Facades\Route;
use Whoops\Run;
use App\Http\Controllers;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware(['auth']);

require __DIR__.'/auth.php';


// Route::resource('/folders', Controllers\FolderController::class)->only([
//     'create', 'store',
// ]);
Route::get('/folders/create', [Controllers\FolderController::class, 'create'])->name('folders.create');
Route::post('/folders/create', [Controllers\FolderController::class, 'store'])->name('folders.store');

// Route::resource('/folders/{id}/tasks', Controllers\TaskController::class)->except([
//     'show',
// ]);
Route::get('/folders/{id}/tasks', [Controllers\TaskController::class, 'index'])->name('tasks.index');
Route::get('/folders/{id}/tasks/create', [Controllers\TaskController::class, 'create'])->name('tasks.create');
Route::post('/folders/{id}/tasks', [Controllers\TaskController::class, 'store'])->name('tasks.store');
Route::get('/folders/{id}/tasks/{taskId}/edit', [Controllers\TaskController::class, 'edit'])->name('tasks.edit');
Route::post('/folders/{id}/tasks/{taskId}', [Controllers\TaskController::class, 'update'])->name('tasks.update');
Route::delete('/folders/{id}/tasks/{taskId}', [Controllers\TaskController::class, 'destroy'])->name('tasks.destroy');