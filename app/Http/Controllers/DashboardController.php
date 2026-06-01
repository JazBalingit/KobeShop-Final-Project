<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Message;

class DashboardController extends Controller
{
    // show dashboard design
    public function ShowDashboardPage()
    {
        $users = User::all();
        $totalAccounts = User::count();
        $totalUsers = User::where('Role', 'User')->count();
        $totalAdmins = User::where('Role', 'Admin')->count();
        $totalMessages = Message::count();

        return view('admin.dashboard', compact(
            'users',
            'totalAccounts',
            'totalUsers',
            'totalAdmins',
            'totalMessages'
        ));
    }

    public function GetUserData()
    {
        // get all user record
        $users = User::all();

        return view('admin.dashboard', compact('users'));
    }

    public function AddUser(Request $request)
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
            'Role'        => 'Admin',
        ]);
        // redirect to log in page and show toast message
        return redirect('dashboard')->with('success', 'Account created successfully.');
    }
    // edit function
    public function EditUser(Request $request)
    {
        // change infrmation fo the id
        User::where('StaffID', $request->editid)->update([
            'LastName'   => $request->editlname,
            'FirstName'  => $request->editfname,
            'MiddleName' => $request->editmname,
            'Email'      => $request->editemail,
            'Gender'     => $request->editgender,
            'Role'       => $request->editrole,
        ]);
        // redirect to dashboard and message
        return back()->with('success', 'User updated successfully!');
    }
    // delete function
    public function DeleteUser(Request $request)
    {
        // delete user id
        User::where('StaffID', $request->deleteid)->delete();
        // redirect back and message
        return back()->with('success', 'User deleted successfully!');
    }
}
