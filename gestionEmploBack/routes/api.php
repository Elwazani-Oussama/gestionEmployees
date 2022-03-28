<?php

use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Route;



Route::post('add-employee', [EmployeeController::class, 'createEmployee']);
Route::get('list-employee', [EmployeeController::class, 'listEmployee']);
Route::get('single-employee/{id}', [EmployeeController::class, 'getSingleEmployee']);
Route::put('update-employee/{id}', [EmployeeController::class, 'UpdateEmployee']);
Route::delete('delete-employee/{id}', [EmployeeController::class, 'DeleteEmployee']);

