<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function create()
    {
        return view('cms.cms_new_user');
    }

    public function newUser()
    {
        User::Insert(['name' => $_POST['Name'], 'email' =>$_POST['email'], 'username' => $_POST['AccountName'], 'password' => Hash::make($_POST['password']), 'address' => $_POST['Address'] ]);

        return Redirect::to('/cms');
    }
}
