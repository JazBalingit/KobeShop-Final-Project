<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Message;

class LandingController extends Controller
{
    // view home page front end
    public function showHomePage()
    {
        return view('landing_page.home');
    }
    // view about page front end
    public function showAboutPage()
    {
        return view('landing_page.about');
    }
    // view contact page front end
    public function showContactPage()
    {
        return view('landing_page.contact');
    }
    // view profile page front end
    public function showProfilePage()
    {
        return view('landing_page.profile');
    }
    // user information function
    public function profile(Request $request)
    {
        // Determine if user or admin is logged in
        $sessionRole = session('admin') ? 'admin' : 'user';
        $user = User::find(session($sessionRole)->StaffID);

        if (!$user) {
            return back()->with('error', 'User not found.');
        }

        // Only change password if currentPass is filled
        if ($request->filled('currentPass')) {
            if (!Hash::check($request->currentPass, $user->Password)) {
                return back()->with('error', 'Current password is incorrect.');
            }

            if ($request->newPass !== $request->confirmPass) {
                return back()->with('error', 'Confirm password is wrong.');
            }

            $user->Password = Hash::make($request->newPass);
        }

        // Update profile fields
        $user->LastName = $request->lname;
        $user->FirstName = $request->fname;
        $user->MiddleName = $request->mname;
        $user->Email = $request->email;
        $user->Gender = $request->gender;
        $user->Bio = $request->bio;
        $user->save();

        // Refresh the correct session
        session([$sessionRole => $user]);

        return back()->with('success', 'User information changed successfully.');
    }
    // profile uploading function
    public function profileUpload(Request $request)
    {
        // Determine if admin or user session is active
        $sessionRole = session('admin') ? 'admin' : 'user';
        $profile = User::find(session($sessionRole)->StaffID);

        if ($request->hasFile('profile_picture')) {

            // Gets the uploaded file
            $file = $request->file('profile_picture');

            // Creates a unique file name using time() and original extension
            $filename = time() . '.' . $file->getClientOriginalExtension();

            // Moves file to 'uploads' folder in public directory
            $file->move(public_path('uploads'), $filename);

            $profile->UserProfile = $filename;
            $profile->save();
            // refresh session
            session([$sessionRole => $profile]);
            return back()->with('success', 'Profile picture updated successfully.');
        }

        return back()->with('error', 'No file selected.');
    }
    // contact function
    public function sendContact(Request $request)
    {

        if (!$request->filled('email') || !$request->filled('name') || !$request->filled('message')) {
            return back()->with('error', 'Message sent failed.');
        }
        // add message on database
        Message::create([
            'Email'   => $request->email,
            'Name'    => $request->name,
            'Message' => $request->message,
        ]);
        // 
        return back()->with('success', 'Message sent successfully.');
    }
}
