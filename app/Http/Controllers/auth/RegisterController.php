<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function register()
    {
        return view ('auth.register');
    }
    public function store(Request $request)
    {

        $errors = Session::get('errors');


        if ($errors) {

            foreach ($errors->all() as $error) {

                echo $error . "<br>";
            }
        }

        $request->validate(
            [
                'name'=>'required',
                'email'=>'required',
                'password'=>'required|confirmed'
            ]
            );


            $user = new User;
            $user->name = $request->input('name');
            $user->email= $request->input('email');
            $user->password=Hash::make($request->input('password'));
            $user->save();

            Auth::login($user);

            return redirect('/success');

    }
}

