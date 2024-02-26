<?php

use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\CustomerController;//

use App\Http\Controllers\EmployeeInsertController;

Route::get('/', [EmployeeInsertController::class, 'insertForm']);
Route::post('/create', [EmployeeInsertController::class, 'insert']);
Route::get('/employees', [EmployeeInsertController::class, 'showEmployee']);
Route::get('/edit/{id}', [EmployeeInsertController::class, 'edit']);
Route::post('/edit/{id}', [EmployeeInsertController::class, 'update']);

/*
Route::get('/customer', [CustomerController::class, 'customerInsert']);
Route::post('/create', [CustomerController::class, 'insert']);
*/


?>
