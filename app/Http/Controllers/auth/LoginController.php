<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Import the User model

class LoginController extends Controller
{
    public function login()
    {
        return view ('auth.login');
    }
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Retrieve the authenticated user
            return redirect('/newemployee');
        } else {
            return back()->withErrors(['Invalid credentials!']);
        }
    }

}
