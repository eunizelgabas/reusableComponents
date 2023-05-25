<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::orderBy('fullname')->get();

        return inertia('users/Index', compact('users'));
    }

    public function create() {
        return inertia('users/Create');
    }

    public function store(Request $request) {
        $request->validate([
            'username'=>'required',
            'fullname'=>'required',
            'designation'=>'required',
            'department'=>'required',
            'password' => 'required'
        ]);

        User::create([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'designation' => $request->designation,
            'department' => $request->department,
            'password' => bcrypt($request->password)
        ]);

        return redirect('/users')->with('Info','A new user has been created.');
    }

    public function edit(User $user) {
        return inertia('users.Edit', [
            'user' => $user,
            'message' => "You have successfully updated user $user->fullname"
        ]);
    }

    public function update(Request $request, User $user) {
        $fields = $request->validate([
            'username'=>'required',
            'fullname'=>'required',
            'designation'=>'required',
            'department'=>'required'
        ]);

        $user->update($fields);

        return redirect('/users');
    }

    public function destroy(User $user){

        $officeCount = $user->offices()->count();

        if ($officeCount > 0) {
            return back()->withErrors(['GeneralErrors' => "You cannot delete user $user->fullname because it is associated with $officeCount office."]);
        }
            $user->delete();
            return redirect('/users')->with('message', 'User Deleted Successfully');


    }
}
