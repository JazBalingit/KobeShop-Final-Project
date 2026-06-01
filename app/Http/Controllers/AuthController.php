<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Show sign up design
    public function showSignUp()
    {
        return view('login_signup.signup');
    }
    // Sign up function
    public function signup(Request $request)
    {
        // check if email exist
        if (User::where('Email', $request->email)->exists()) {
            return back()->with('error', 'Email already exist.');
        }
        // validation of confirm password
        if ($request->password != $request->cPassword) {
            return back()->with('error', 'Confirm password is wrong.');
        }
        // insert the data on database
        User::create([
            'LastName'    => $request->lname,
            'FirstName'   => $request->fname,
            'MiddleName'  => $request->mname,
            'Email'       => $request->email,
            'Gender'      => $request->gender,
            'Password'    => Hash::make($request->password),
            'Role'        => 'User',
        ]);
        // redirect to log in page and show toast message
        return redirect('login')->with('success', 'Account created successfully.');
    }
    // log in function
    public function login(Request $request)
    {
        // check if the email exist
        $user = User::where('Email', $request->email)->first();

        // if email doesnt exist or password isnt same with the password on the data, it'll return an error toast msg
        if (!$user || !Hash::check($request->password, $user->Password)) {
            return back()->with('error', 'Invalid credentials.');
        }

        if ($user->Role == 'User') {
            // redirect to home page for user with toast msg
            session(['user' => $user]);
            return redirect('home')->with('success', 'Log in successfully.');
        } else {
            session(['admin' => $user]);
            return redirect('dashboard')->with('success', 'Log in successfully.');
        }
    }
    // show log in design
    public function showLogIn()
    {
        return view('login_signup.login');
    }
    // log out function
    public function logout(Request $request)
    {
        // destroy the session user
        session()->forget('user');
        session()->forget('admin');
        // redirect to login and show toast msg
        return redirect('login')->with('success', 'Logged out successfully.');
    }
}
