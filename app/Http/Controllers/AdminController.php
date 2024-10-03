<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    Public function admin_dashboard(){
        $user_details = Auth::user();
        return view('admin.dashboard', compact('user_details'));
    }
}
