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
}


