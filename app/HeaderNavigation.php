<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HeaderNavigation extends Model
{
    /**
     * @return mixed
     */
    public static function getMainNavigationArray()
    {
        $rawNavigationData = DB::table('header_navigations')->where('parent_id', null)->orderBy('priority', 'desc')->get();
        return $rawNavigationData;
    }

    /**
     * @return mixed
     */
    public static function getSubNavigationArray()
    {
        $rawNavigationData = DB::table('header_navigations')->where('parent_id', '<>', null)->orderBy('priority', 'desc')->get();
        return $rawNavigationData;
    }

    /**
     * @return array
     */
    public static function getAllNavigationArray()
    {
        $rawMainNavigation = self::getMainNavigationArray();
        $rawAllNavigation = DB::table('header_navigations')->orderBy('priority', 'desc')->get();

        $sortedNavigation = array();
        foreach ($rawMainNavigation as $key => $value)
        {
            $sortedNavigation[$value->id] = $value;
            foreach ($rawAllNavigation as $subkey => $subvalue)
            {
                if ($subvalue->parent_id == $value->id)
                {
                    $sortedNavigation[$subvalue->id] = $subvalue;
                }
            }
        }
        return $sortedNavigation;
    }

    /**
     * @return array
     */
    public static function getDisabledPriorityUpArray()
    {
        $priorityArray = array();
        $firstMainNav = DB::table('header_navigations')->whereNull('parent_id')->max('priority');
        $priorityArray['firstMainNav'] = $firstMainNav;

        $distinctParentIDs = DB::table('header_navigations')->whereNotNull('parent_id')->distinct()->get();
        foreach ($distinctParentIDs as $dist)
        {
            $object = DB::table('header_navigations')->where('parent_id', $dist->parent_id)->max('priority');
            $priorityArray[$object] = $object;
        }
        return $priorityArray;
    }

    /**
     * @return array
     */
    public static function getDisabledPriorityDownArray()
    {
        $priorityArray = array();
        $lastMainNav = DB::table('header_navigations')->whereNull('parent_id')->min('priority');
        $priorityArray['lastMainNav'] = $lastMainNav;

        $distinctParentIDs = DB::table('header_navigations')->whereNotNull('parent_id')->distinct()->get();
        foreach ($distinctParentIDs as $dist)
        {
            $object = DB::table('header_navigations')->where('parent_id', $dist->parent_id)->min('priority');
            $priorityArray[$object] = $object;
        }
        return $priorityArray;
    }
}
