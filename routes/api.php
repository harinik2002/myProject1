<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\EmployeeController;



/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::get("list",[EmployeeController::class,'list']);

Route::post("add",[EmployeeController::class,'add']);

?>

