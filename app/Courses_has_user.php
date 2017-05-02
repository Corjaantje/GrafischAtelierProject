<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses_has_user extends Model
{
    public static function getSignedUp($id)
    {
        $course = Courses_has_user::where('courses_id', $id)->get();
        if($course->isEmpty())
        {
            return 0;
        }
        else
        {
            return $course->count();
        }
    }
}
