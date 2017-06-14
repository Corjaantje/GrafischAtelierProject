<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndividualReservation extends Model
{
    protected $table = 'individual_reservations';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function table()
    {
        return $this->hasOne('App\Table', 'id', 'table_id');
    }
}