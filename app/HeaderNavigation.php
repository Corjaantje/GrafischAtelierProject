<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HeaderNavigation extends Model
{
    public static function getMainNavigationArray()
    {
        $rawNavigationData = DB::table('header_navigations')->where('parent_id', null)->orderBy('priority', 'desc')->get();
        return $rawNavigationData;
    }

    public static function getSubNavigationArray()
    {
        $rawNavigationData = DB::table('header_navigations')->where('parent_id','<>' , null)->orderBy('priority', 'desc')->get();
        return $rawNavigationData;
    }

    public static function getAllNavigationArray()
    {
        $rawMainNavigation = self::getMainNavigationArray();
        $rawAllNavigation = DB::table('header_navigations')->orderBy('priority', 'desc')->get();

        $sortedNavigation = array();
        foreach($rawMainNavigation as $key => $value)
        {
            $sortedNavigation[$value->id] = $value;
            foreach($rawAllNavigation as $subkey => $subvalue)
            {
                if($subvalue->parent_id == $value->id)
                {
                    $sortedNavigation[$subvalue->id] = $subvalue;
                }
            }
        }
        return $sortedNavigation;
    }}
