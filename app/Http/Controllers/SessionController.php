<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class SessionController extends Controller
{

    private static $type;
    private static $date;
    private static $time;

    // stap 1
    public function storeType(Request $request)
    {
        if (isset($_POST['btnWerkplaats']))
        {
            $type = $request->get('werkplaats');
        }
        else
        {
           $type = $request->get('cursus');
        }
        session()->put('type', $type);
        return view('reservation.reservation_step3');
    }

    // stap 4
    public function storeDateTime(Request $request)
    {
        $date = $request->get('date');
        $time = $request->get('start_time');
        session()->put('date', $date);
        session()->put('time', $time);
        return view('reservation.reservation_step5');
    }

    public static function getType()
    {
        return session()->get('type');
    }

    public static function getDateTime()
    {
        return session()->get('date') . ' ' . session()->get('time');
    }
}
