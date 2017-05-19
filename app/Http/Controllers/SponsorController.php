<?php

namespace App\Http\Controllers;

use App\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Auth;

class SponsorController extends Controller
{
    //authenticatie
    private function validateUser()
    {
        if(!Auth::check() || !Auth::user()->role == "admin")
        {
            return false;
        }
    }


    public function create()
    {
        if ($this->validateUser() === false)
        {
            return Redirect::to('403');
        }

        return view('cms.sponsors.cms_new_sponsor');
    }

    public function newSponsor(Request $request)
    {
        //authenticatie
        if ($this->validateUser() === false) {
            return Redirect::to('403');
        }

        $this->validate($request, [
            'Image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = $request->Image->getClientOriginalName();

        $request->Image->move(public_path('img\Sponsors'), $imageName);

        //validatie
        if (isset($_POST['Name']) && isset($imageName) && isset($_POST['URL']))
        {
            Sponsor::Insert(['name' => $_POST['Name'], 'image' => $imageName, 'sponsor_url' => $_POST['URL'] ]);
        }

        return Redirect::to('/cms_sponsor');
    }

    public function edit(Request $request)
    {
        //authenticatie
        if ($this->validateUser() === false)
        {
            return Redirect::to('403');
        }

        $this->validate($request, [
            'Image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = $request->Image->getClientOriginalName();

        $request->Image->move(public_path('img\Sponsors'), $imageName);

        //validatie
        if (isset($_POST['Name']) && isset($imageName) && isset($_POST['URL']))
        {
            Sponsor::Where('id', '=', $_POST['id'])->update(['name' => $_POST['Name'],
                'image' => $imageName, 'sponsor_url' => $_POST['URL']]);
        }
        /* else
         * {
         *  return error page
         * }
         */

        return Redirect::to('/cms_sponsor');
    }

    function editView($sponsorNumber)
    {
        //authenticatie
        if ($this->validateUser() === false)
        {
            return Redirect::to('403');
        }

        $data = ['number' => $sponsorNumber];
        return view('cms.sponsors.cms_edit_sponsor', $data);
    }

    function delete()
    {
        //authenticatie
        if ($this->validateUser() === false)
        {
            return Redirect::to('403');
        }

        //validatie
        if (isset($_POST['id']))
        {
            Sponsor::destroy($_POST['id']);
        }

        return Redirect::to('cms_sponsor');
    }
}
