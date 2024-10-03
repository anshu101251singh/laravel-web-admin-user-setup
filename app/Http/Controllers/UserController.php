<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    Public function user_dashboard(){
        $user_details = Auth::user();
        return view('user.dashboard', compact('user_details'));
    }
}
