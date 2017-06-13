<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Auth;

class UserController extends Controller
{
    public function createList()
    {
        if($this->checkAdmin())
        {
            $users = User::all();
            return view("cms.users.cms_user_list", compact('users'));
        }
        else
        {
            return Redirect::to('403');
        }
    }

    public function createEdit()
    {
        if ($this->checkAdmin())
        {
            $matchingUser = User::find($_POST['id']);
            //Todo get user id
            return view("cms.users.cms_edit_user", compact('matchingUser'));
        }
        else
        {
            return Redirect::to('403');
        }
    }

    public function createAdd()
    {
        if (!$this->checkAdmin())
        {
            return Redirect::to('403');
        }
        return view('cms.users.cms_new_user');
    }

    public function removeUser()
    {
        if (!$this->checkAdmin())
        {
            return Redirect::to('403');
        }
        else
        {
            User::destroy($_POST['id']);
            return Redirect::to("cms/gebruikers");
        }
    }



    public function newUser()
    {
        if (!$this->checkAdmin())
        {
            return Redirect::to('403');
        }

        //validate if post is set correctly
        if ($_POST['first_name'] != null && $_POST['last_name'] != null && $_POST['email'] != null &&
            $_POST['username'] != null && $_POST['password'] != null && $_POST['address'] != null)
        {
            if (isset($_POST['role'])) //also validate if role is set
            {
                User::Insert(['first_name' => $_POST['first_name'], 'last_name' => $_POST['last_name'],
                    'email' =>$_POST['email'], 'username' => $_POST['username'], 'password' => Hash::make($_POST['password']),
                    'address' => $_POST['address'], 'role' => 'admin']);
            }
            else
            {
                User::Insert(['first_name' => $_POST['first_name'], 'last_name' => $_POST['last_name'],
                    'email' =>$_POST['email'], 'username' => $_POST['username'], 'password' => Hash::make($_POST['password']),
                    'address' => $_POST['address'] ]);
            }

        }
        else
        {
            // return error message
        }
        return Redirect::to('cms/gebruikers');
    }

    public function editUser()
    {
        if (!$this->checkAdmin())
        {
            return Redirect::to('403');
        }

        //validate if post is set correctly
        if ($_POST['first_name'] != null && $_POST['last_name'] != null && $_POST['email'] != null &&
            $_POST['username'] != null  && $_POST['address'] != null)
        {
            $user = User::find($_POST['id']);

            $user->first_name = $_POST['first_name'];
            $user->last_name = $_POST['last_name'];
            $user->email = $_POST['email'];
            $user->username = $_POST['username'];
            $user->address = $_POST['address'];
            if (isset($_POST['role']))
            {
                $user->role = 'admin';
            }
            else
            {
                $user->role = '';
            }

            $user->save();
        }
        return Redirect::to('cms/gebruikers');
    }

    private function checkAdmin()
    {
        if (Auth::check())
        {
            if (Auth::user()->role == "admin")
            {
                return true;
            }
        }
        return false;
    }
}
