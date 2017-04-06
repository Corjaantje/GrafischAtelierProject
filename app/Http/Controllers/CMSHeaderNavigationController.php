<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CMSHeaderNavigationController extends Controller
{
    public function create()
    {
        return view('cms.cms_header', ['message' => ""]);
    }

    public function store(Request $request)
    {
        echo $request->visible;
        if ($request->visible == 1) {
            $visible = 1;
        } else {
            $visible = 0;
        }
        DB::table('header_navigations')->where('id', $request->id)->update(['name' => $request->name]);
        DB::table('header_navigations')->where('id', $request->id)->update(['visible' => $visible]);
        return view('cms.cms_header', ['message' => "Succesvol opgeslagen!"]);
    }
}
