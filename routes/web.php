<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });




Route::get('/', [StudentController::class, 'listStudent'])->name('student.list');
Route::get('/add', [StudentController::class, 'addStudent'])->name('student.add');
Route::post('/store', [StudentController::class, 'storeStudent'])->name('student.store');
Route::get('/edit/{id}', [StudentController::class, 'editStudent'])->name('student.edit');
Route::post('/update', [StudentController::class, 'updateStudent'])->name('student.update');
Route::get('/delete/{id}', [StudentController::class, 'deleteStudent'])->name('student.delete');


