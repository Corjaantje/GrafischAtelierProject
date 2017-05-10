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
            if(Auth::user()->role == "admin")
            {
                $role = "Beheerder";
            }
            else
            {
                $role = "Gebruiker";
            }
            $userinfo = array(
                'username' => Auth::user()->username,
                'role' => $role,
                'mail' => Auth::user()->email,
            );
            return view('profile', compact('userinfo'));
        }
    }
}
