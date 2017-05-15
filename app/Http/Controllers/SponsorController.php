<?php

namespace App\Http\Controllers;

use App\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Auth;

class SponsorController extends Controller
{
    public function create()
    {
        return view('cms.sponsors.cms_new_sponsor');
    }

    public function newSponsor(Request $request)
    {
        $this->validate($request, [
            'Image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = $request->Image->getClientOriginalName();

        $request->Image->move(public_path('img\Sponsors'), $imageName);

        Sponsor::Insert(['name' => $_POST['Name'], 'image' => $imageName, 'sponsor_url' => $_POST['URL'] ]);

        return Redirect::to('/cms_sponsor');
    }

    public function edit()
    {
        Sponsor::Where('id', '=', $_POST['id'])->update(['name' => $_POST['name'],
            'image' => $_POST['image'], 'sponsor_url' => $_POST['sponsor_url'] ]);

        return Redirect::to('/cms_sponsor');
    }
    //
    function deleteAction()
    {
        Sponsor::destroy($_POST['id']);
        return Redirect::to('cms_sponsor');
    }
}
