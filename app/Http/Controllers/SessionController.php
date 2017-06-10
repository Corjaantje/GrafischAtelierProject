<?php

namespace App\Http\Controllers;

use App\IndividualReservation;
use App\Table;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use DB;
use Illuminate\Support\Facades\Redirect;

class SessionController extends Controller
{
    // stap 4
    public function storeDateTime(Request $request)
    {
        $date = date('Y-m-d H:i:s');
        $usedTables = DB::table('individual_reservations')->where('table_id', session()->get('table_id'))/*->where('start_date', '>', $date)*/
        ->get();
        $dateTimeStart = $request->get('date') . " " . $request->get('start_time') . ":00";
        $dateTimeEnd = $request->get('date') . " " . $request->get('end_time') . ":00";
        foreach ($usedTables as $res)
        {
            if (($res->start_date >= $dateTimeStart && $res->start_date <= $dateTimeEnd) || ($res->end_date >= $dateTimeStart && $res->end_date <= $dateTimeEnd))
            {
                $error = "Deze tafel is al gereserveerd op " . substr($res->start_date, 0, 10) . " van " . substr($res->start_date, 11, 5) . " tot " . substr($res->end_date, 11, 5) . "!";
                return view('reservation.reservation_step4', compact('error'));
            }
        }
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
            ['user_id' => Auth::user()->id,
                'table_id' => self::getTable(),
                'start_date' => date(self::getDate() . "." . self::getStartTime()),
                'end_date' => date(self::getDate() . "." . self::getEndTime()),
                'price' => 50
            ]);

        return Redirect::to('/agenda');
    }
}
