<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class SessionController extends Controller
{
    public function accessSessionData(Request $request, $key)
    {
        if ($request->session()->has($key))
        {
            echo $request->session()->get($key);
        }
        else
        {
            echo 'No data in the session.';
        }
    }

    public function storeSessionData(Request $request, $key, $value)
    {
        $request->session()->put($key, $value);
        echo 'Data has been added to the session.';
    }

    public function deleteSessionData(Request $request, $key)
    {
        $request->session()->forget($key);
        echo 'Data has been removed from session.';
    }
}
