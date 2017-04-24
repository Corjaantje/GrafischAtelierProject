<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndividualReservation extends Model
{
    protected $table = 'individual_reservations';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;


    function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

}