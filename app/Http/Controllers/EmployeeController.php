<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;
class EmployeeController extends Controller
{
    //

    function list()
    {
        return employee::all();

    }

    function  add(Request $request)
    {
        $employee=new employee;
        $employee->name=$request->name;
        $employee->email=$request->email;
        $result=$employee->save();
        if ($result)
        {
        return ["Employee details inserted successfully"];
        }
        else
        {
        return[" Ooperation Failed"];
        }
    }
}
