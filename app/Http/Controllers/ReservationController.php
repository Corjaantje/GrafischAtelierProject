<?php

namespace App\Http\Controllers;

use App\Courses_has_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Reservation;
use Illuminate\Support\Facades\Redirect;

class ReservationController extends Controller
{
    public function create()
    {
        return view('cms.cms_new_reservation');
    }

    public function newReservation(Request $request)
    {
        Courses_has_user::Insert(['course_id' => $_POST['cbCursus'], 'user_id' => $_POST['cbUsers'] ]);

        return Redirect::to('/cms');
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
}
