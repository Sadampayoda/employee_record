<?php

use App\Http\Controllers\{EmployeeController, EmpPresenceController, EmpSalaryController};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('dashboard');

Route::resource('employee',EmployeeController::class);
Route::resource('presence',EmpPresenceController::class);
Route::resource('emp_salaries',EmpSalaryController::class);

