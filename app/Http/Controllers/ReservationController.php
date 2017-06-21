<?php

namespace App\Http\Controllers;

use App\Courses_has_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Reservation;
use Illuminate\Support\Facades\Redirect;
use Auth;

class ReservationController extends Controller
{
    private function validateUser()
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

    public function create()
    {
        if (!$this->validateUser())
        {
            return Redirect::to('403');
        }
        else
        {
            return view('cms.cms_new_reservation');
        }
    }

    public function newReservation(Request $request)
    {
        if (!$this->validateUser())
        {
            return Redirect::to('403');
        }
        else
        {
            if (Courses_has_user::where([
                    ['user_id', '=', $request->cbUsers],
                    ['course_id', '=', $request->cbCursus]
                ])->count() === 0
            )
            {
                Courses_has_user::Insert(['course_id' => $request->cbCursus, 'user_id' => $request->cbUsers]);
                return Redirect::to('/cms/reservations');
            }
            else
            {
                return Redirect::to('error');
            }
        }
    }

    public static function getAllUsers()
    {
        $users = DB::table('users')->get();
        return $users;
    }

    public static function getAllCourses()
    {
        $courses = DB::table('courses')->get();
        return $courses;
    }

    // return null if validation is correct, returns other reservation start and enddate if incorrect.
    public function reservationValidation($reservation, $start, $end)
    {
        $usedTables = DB::table('individual_reservations')->where('table_id', $reservation->table_id)->where('id', '!=', $reservation->id)/*->where('start_date', '>', $date)*/
        ->get();


        foreach ($usedTables as $res)
        {
            if (($res->start_date >= $start && $res->start_date <= $end) || ($res->end_date >= $start && $res->end_date <= $end))
            {
                return ['start' => $res->start_date, 'end' => $res->end_date];
            }
        }

        return null;
    }
}
