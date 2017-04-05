<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeaderNavigation extends Model
{
    public static function getMainNavigationArray()
    {
        $rawNavigationData = HeaderNavigation::all()->where('parent_id', null);
        //NEED TO SET ORDER PROPERLY!
        return $rawNavigationData;
    }

    public static function getSubNavigationArray()
    {
        $rawNavigationData = HeaderNavigation::all()->where('parent_id','<>' , null);
        //NEED TO SET ORDER PROPERLY!
        return $rawNavigationData;
    }

    public static function getAllNavigationArray()
    {
        $rawNavigationData = HeaderNavigation::all();
        //NEED TO SET ORDER PROPERLY!
        return $rawNavigationData;
    }}
