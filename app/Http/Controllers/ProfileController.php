<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;

class ProfileController extends Controller
{
    public function getProfile()
    {
        if (!Auth::check())
        {
            return Redirect::to('login');
        }
        else
        {
            return view('profile');
        }
    }
}
