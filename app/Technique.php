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

    public static function getTechniqueByTableID($id)
    {
        $tables = Table::where('id', $id)->first();
        return self::where('id', $tables->technique_id)->first()->name;
    }
}
