<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $userId = Auth::id(); 

        $viewData = [];
        $viewData["title"] = "Sandwich Queen";
        $viewData["subtitle"] = "Profile";
        $viewData["userId"] = $userId;
        $viewData["user"] = Auth::user();;

        return view('user.index')->with("viewData", $viewData);
    }
}
