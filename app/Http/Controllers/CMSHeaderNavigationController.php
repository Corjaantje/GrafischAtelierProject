<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CMSHeaderNavigationController extends Controller
{
    public function create()
    {
        return view('cms.cms_header');
    }

    public function store()
    {
        echo "trololo";
    }
}
