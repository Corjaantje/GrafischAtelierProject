<?php

namespace App\Http\Controllers;

use App\HeaderNavigation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class CMSHeaderNavigationController extends Controller
{
    public function create()
    {
        return view('cms.cms_header', ['message' => ""]);
    }

    public function store(Request $request)
    {
        $data = Input::all();

        if (isset($data['priorityUp'])) {
            $toSwapNav = DB::table('header_navigations')->where('priority', '>', $request->priority)->orderBy('priority', 'asc')->first();
            $priority1 = $toSwapNav->priority;
            $priority2 = $request->priority;
            DB::table('header_navigations')->where('id', $request->id)->update(['priority' => $priority1]);
            DB::table('header_navigations')->where('id', $toSwapNav->id)->update(['priority' => $priority2]);
            return view('cms.cms_header', ['message' => "Volgorde veranderd!"]);
        }

        if (isset($data['priorityDown'])) {
            $toSwapNav = DB::table('header_navigations')->where('priority', '<', $request->priority)->orderBy('priority', 'desc')->first();
            $priority1 = $toSwapNav->priority;
            $priority2 = $request->priority;
            DB::table('header_navigations')->where('id', $request->id)->update(['priority' => $priority1]);
            DB::table('header_navigations')->where('id', $toSwapNav->id)->update(['priority' => $priority2]);
            return view('cms.cms_header', ['message' => "Volgorde veranderd!"]);
        }

        if (isset($data['store'])) {
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

}
