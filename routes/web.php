<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ClassNamesController;
use App\Http\Controllers\TeachersController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::post('/insert-employee', [EmployeeController::class, 'insertEmployee']);
Route::get('/list-employee', [EmployeeController::class, 'listEmployee']);
Route::get('/update-employee-page', [EmployeeController::class, 'updateEmployeepage']);
Route::post('/update-employee', [EmployeeController::class, 'updateEmployee']);
Route::post('/delete-employee', [EmployeeController::class, 'deleteEmployee']);















// for student

Route::get('/class-page', [ClassNamesController::class, 'classpage']);
Route::post('/insert-Classname', [ClassNamesController::class, 'insertClassname']);


// for teachers
Route::get('/teacher-page', [TeachersController::class, 'teasherspage']);
Route::post('/insert-teacher', [TeachersController::class, 'insertteacher']);
Route::get('/Teacher-list', [TeachersController::class, 'Teacherlist']);
Route::get('/updateTeacher-page-page/{id}', [TeachersController::class, 'upteapage']);
Route::post('/update-Teacher/{id}', [TeachersController::class, 'updateTeacher']);
Route::get('/delete-teacher/{id}', [TeachersController::class, 'deleteTeacher']);
// Route::post('/insert-Classname', [ClassNamesController::class, 'insertClassname']);
