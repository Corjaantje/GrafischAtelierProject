<?php

namespace App\Http\Controllers;

use App\IndividualReservation;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Illuminate\Support\Facades\Redirect;

class SessionController extends Controller
{
    // stap 1
    public function storeType(Request $request)
    {
        if (isset($_POST['btnWerkplaats']))
        {
            return view('reservation.reservation_step3');
        }
        else
        {
           return view('courses');
        }
    }

    // stap 4
    public function storeDateTime(Request $request)
    {
        session()->put('date', $request->get('date'));
        session()->put('start_time', $request->get('start_time'));
        session()->put('end_time', $request->get('end_time'));
        session()->put('table_id', $request->get('table_id'));
        return view('reservation.reservation_step5');
    }

    public static function getDate()
    {
        return session()->get('date');
    }

    public static function getStartTime()
    {
        return session()->get('start_time');
    }

    public static function getEndTime()
    {
        return session()->get('end_time');
    }

    public static function getTable()
    {
        return session()->get('table_id');
    }

    // stap 5
    public function insertReservation(Request $request)
    {
        IndividualReservation::Insert(
            [   'user_id' => Auth::user()->id,
                'table_id' => self::getTable(),
                'start_date' => date(self::getDate().".".self::getStartTime()),
                'end_date' => date(self::getDate().".".self::getEndTime()),
                'price' => 50
            ]);

        return Redirect::to('/agenda');
    }
}
