<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technique extends Model
{
    //The model for the techniques, which could be "Zeefdruk" or "Lithografie", for example.
    protected $table = 'techniques';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
}
