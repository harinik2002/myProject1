<?php



//use App\Http\Controllers\CustomerController;//
use App\Http\Controllers\ConstantController;
use App\Http\Controllers\EmployeeInsertController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('constant',[ConstantController::class,'index']);

Route::view('register','auth.register');
Route::post('store',[RegisterController::class,'store']);
Route::view('/','/home');
Route::view('login','auth.login');
Route::post('authenticate',[LoginController::class,'authenticate']);
Route::get('logout',[EmployeeInsertController::class,'logout']);
Route::view('success','/registersuccess');


Route::get('/newemployee', [EmployeeInsertController::class, 'insertForm']);
Route::post('/create', [EmployeeInsertController::class, 'insert']);
Route::get('/employees', [EmployeeInsertController::class, 'showEmployee']);
Route::get('/edit/{id}', [EmployeeInsertController::class, 'edit']);
Route::post('/edit/{id}', [EmployeeInsertController::class, 'update']);

/*
Route::get('/customer', [CustomerController::class, 'customerInsert']);
Route::post('/create', [CustomerController::class, 'insert']);
*/


?>
