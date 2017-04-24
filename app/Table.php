<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    //The model class for the Tables. These are the tables in the workshop, which consist of a technique and a number, for example "Zeefdruk - 1".
    protected $table = 'tables';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;


    function tech()
    {
        return $this->hasOne('App\Technique', 'id', 'technique_id');
    }
}
