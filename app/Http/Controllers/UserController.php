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
            if (isset($_POST['id']))
            {
                $matchingUser = User::find($_POST['id']);
                return view("cms.users.cms_edit_user", compact('matchingUser'));
            }

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
            if (isset($_POST['id']))
            {
                User::destroy($_POST['id']);
            }
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
        if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email'])
            && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['address']))
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
        if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email'])
            && isset($_POST['username']) && isset($_POST['address']) && isset($_POST['id']))
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
