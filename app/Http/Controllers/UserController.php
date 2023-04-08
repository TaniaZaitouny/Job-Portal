<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Job::class, 'job');
    }

    // public function showProfile()
    // {
    //     $user_name = Auth::user()->name;
    //     $user_email = Auth::user()->email;
    //     return view('userProfile');
    // }
 
}
