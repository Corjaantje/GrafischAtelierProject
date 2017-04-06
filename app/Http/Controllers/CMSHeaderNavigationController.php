<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CMSHeaderNavigationController extends Controller
{
    public function create()
    {
        return view('cms.cms_header');
    }

    public function store()
    {
        DB::table('header_navigations')->where('id', 1)->update(['name' => 'hoi']);
    }
}
