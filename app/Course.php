<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;


    public function tables()
    {
        return $this->belongsToMany('App\Table', 'course_has_tables', 'course_id', 'table_id');
    }

    public function reservations()
    {
        return $this->belongsToMany('App\User', 'courses_has_users', 'course_id', 'user_id');
    }

    public function reservationFromUser($id)
    {
        $list = $this->belongsToMany('App\User', 'courses_has_users', 'course_id', 'user_id');
        foreach ($list as $user)
        {
            if ($user->id == $id)
            {
                return $user;
            }
        }
    }
}


