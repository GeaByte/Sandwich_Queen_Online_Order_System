<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index()
    {
        $admin = Auth::User();
        $viewData = [];
        $viewData["title"] = "Sandwich Queen Admin";
        $viewData["admin"] = $admin;
        return view('admin.home.index')->with("viewData", $viewData);
    }
}
