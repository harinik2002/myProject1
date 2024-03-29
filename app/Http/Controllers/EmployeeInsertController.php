<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class EmployeeInsertController extends Controller
{
    public function insertForm()
    {
        $errors = Session::get('errors');
        try {
            return view('insert_form');
        } catch (Exception $e) {

            return redirect()->back()->withErrors(['errors' => 'An error occurred while loading the form.']);
        }
    }

    public function insert(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email_id' => 'required|email|max:255',
                'phone_number' => 'required|digits:10',
                'department' => 'required|string|max:255',
                'photo' => 'image|mimes:jpg|max:2048'
            ]);

            $name = $request->input('name');
            $email_id = $request->input('email_id');
            $phone_number = $request->input('phone_number');
            $department = $request->input('department');


            $existingEmployee = DB::table('harinidb1.employee')
                ->where('email_id', $email_id)
                ->orWhere('phone_number', $phone_number)
                ->first();

            $errors = Session::get('errors');

            if ($existingEmployee) {
                return Redirect::back()->withInput()->withErrors(['errors' => 'Employee with the same email or phone number already exists.']);
            }



            if ($request->hasFile('photo')) {

                $currentDate = date('Ymd');
                $fileExtension = $request->file('photo')->getClientOriginalExtension();
                $fileName = "zaaroz{$currentDate}.{$fileExtension}";
                $path = $request->file('photo')->storeAs('public/photos', $fileName);
            } else {
                $fileName = null;
            }

            DB::table('harinidb1.employee')->insert([
                'name' => $name,
                'email_id' => $email_id,
                'phone_number' => $phone_number,
                'department' => $department,
                'photo' => $fileName
            ]);

            return $this->showEmployee();
        }catch(Exception $e){
            return redirect()->back()->withErrors(['errors' => 'An error occurred while inserting employee data.']);
        }
    }


    public function showEmployee()
    {

        $errors = Session::get('errors');
        try {
            $employees = DB::table('harinidb1.employee')->get();
            return view('show_inserted_data', ['employees' => $employees]);
        } catch (Exception $e) {

            return redirect()->back()->withErrors(['errors' => 'An error occurred while fetching employee data.']);
        }
    }

    public function edit($id)
    {
        $errors = Session::get('errors');
        try {
            $employee = DB::table('harinidb1.employee')->where('id', $id)->first();
            return view('employee_edit', ['employee' => $employee]);
        } catch (Exception $e) {

            return redirect()->back()->withErrors(['errors' => 'An error occurred while loading employee data for editing.']);
        }
    }

    public function update(Request $request, $id)
    {
        $errors = Session::get('errors');
        try {

            $request->validate([
                'name' => 'required|string|max:255',
                'email_id' => 'required|email|max:255',
                'phone_number' => 'required|digits:10',
                'department' => 'required|string|max:255',
                'photo' => 'image|mimes:jpg|max:2048'
            ]);

            $name = $request->input('name');
            $email_id = $request->input('email_id');
            $phone_number = $request->input('phone_number');
            $department = $request->input('department');

            $existingEmployee = DB::table('harinidb1.employee')
                ->where('id', '!=', $id)
                ->where(function ($query) use ($email_id, $phone_number) {
                    $query->where('email_id', $email_id)
                        ->orWhere('phone_number', $phone_number);
                })
                ->first();

            if ($existingEmployee) {
                return Redirect::back()->withInput()->withErrors(['errors' => 'Employee with the same email or phone number already exists.']);
            }
            $employee = DB::table('harinidb1.employee')->where('id', $id)->first();

            if ($request->hasFile('photo')) {
                if ($employee->photo) {
                    storage::delete('public/photos/' . $employee->photo);
                }
                $currentDate = date('Ymd');
                $fileExtension = $request->file('photo')->getClientOriginalExtension();
                $fileName = "zaaroz{$currentDate}.{$fileExtension}";
                $path = $request->file('photo')->storeAs('public/photos', $fileName);
            } else {
                $fileName = $employee->photo;
            }

            DB::table('harinidb1.employee')->where('id', $id)->update([
                'name' => $name,
                'email_id' => $email_id,
                'phone_number' => $phone_number,
                'department' => $department,
                'photo' => $fileName
            ]);

            return redirect("/employees");

        } catch (Exception $e) {

            return redirect()->back()->withErrors(['errors' => 'An error occurred while updating employee data.']);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/home');
    }

}


