<?php

namespace App\Http\Controllers;

use App\IndividualReservation;
use Illuminate\Http\Request;
use App\Http\Requests;

class SessionController extends Controller
{
    // stap 1
    public function storeType(Request $request)
    {
        if (isset($_POST['btnWerkplaats']))
        {
            $type = $request->get('werkplaats');
            session()->put('type', $type);
            return view('reservation.reservation_step3');
        }
        else
        {
           $type = $request->get('cursus');
            session()->put('type', $type);
           return view('courses');
        }
    }

    // stap 4
    public function storeDateTime(Request $request)
    {
        $date = $request->get('date');
        $time = $request->get('start_time');
        $end_time = $request->get('end_time');
        session()->put('date', $date);
        session()->put('time', $time);
        session()->put('end_time', $end_time);
        return view('reservation.reservation_step5');
    }

    public static function getType()
    {
        return session()->get('type');
    }

    public static function getDate()
    {
        return session()->get('date');
    }

    public static function getTime()
    {
        return session()->get('time');
    }

    public static function getEndTime()
    {
        return session()->get('end_time');
    }

    public function insertReservation()
    {
        IndividualReservation::Insert(['user_id' => 1, 'table_id' => $_POST['table_id'], 'date' => $_POST['date'],
            'start_time' => $_POST['start_time'], 'end_time' => $_POST['end_time'], 'price' => 50 ]);

        return view('reservation.reservation_step1');
    }
}
