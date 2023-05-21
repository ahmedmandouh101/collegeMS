<?php

use App\Models\Departments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\stController;
use App\Http\Controllers\pageController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\studentController;

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

Route::get('/department',  function () {
    $departments = Departments::get();
    return view('department', ['departments' => $departments]);
})->name('department');
Route::get('/',  function () {
    return view('welcome');
});

Route::get('/form', [studentController::class, 'index'])->name('register');

Route::resource('subjects', pageController::class);


Route::middleware(['auth', 'isDoctor'])->resource('doctor', DoctorController::class);


Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/account', [AccountController::class, 'create_account'])->name('account.create');
Route::post('/', [AccountController::class, 'store_account'])->name('account.store');


Route::post('/form', [studentController::class, 'index'])->name('form');
Route::post('/student', [studentController::class, 'store'])->name('form.store');



Route::get('/student', [stController::class, 'index'])->name('student.index');
