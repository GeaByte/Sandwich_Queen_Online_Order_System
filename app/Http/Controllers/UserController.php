<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use app\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $viewData = [];
        $viewData["title"] = "Sandwich Queen";
        $viewData["subtitle"] = "My Profile";
        $viewData["user"] = $user;
        return view('user.index')->with("viewData", $viewData);
    }

    public function update(Request $request){
        $userId = Auth::User()->id;
        $user = User::findOrFail($userId);
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $userId],
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ];
        $validateData = $request->validate($rules);
        $user->update($validateData);
        return redirect('/')->with('success', 'Profile updated successfully.');
    }
}
