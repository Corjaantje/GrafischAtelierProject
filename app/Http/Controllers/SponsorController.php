<?php

namespace App\Http\Controllers;

use App\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Illuminate\Support\Facades\Validator;

class SponsorController extends Controller
{
    //authenticatie
    private function validateUser()
    {
        if(Auth::check())
        {
            if(Auth::user()->role == "admin")
            {
                return true;
            }
        }
        return false;
    }

    public function overview()
    {
        if(!$this->validateUser())
        {
            return Redirect::to('403');
        }
        else
        {
            return view('cms.sponsors.cms_sponsor');
        }
    }

    public function create()
    {
        if (!$this->validateUser())
        {
            return Redirect::to('403');
        }
        else
        {
            return view('cms.sponsors.cms_new_sponsor');
        }
    }

    public function newSponsor(Request $request)
    {
        //authenticatie
        if (!$this->validateUser()) {
            return Redirect::to('403');
        }
        else
        {
            $rules = array(
                'Image' => 'required | mimes:jpeg,jpg,png',
            );

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                \Session()->flash('msg', 'Dit type bestand mag u niet uploaden! Probeer het nog eens met een .jpeg, .jpg of .png bestand!');
                return Redirect::to('/cms_sponsor');
            }
            $imageName = $request->Image->getClientOriginalName();

            $request->Image->move(public_path('img\Sponsors'), $imageName);

            //validatie
            if (isset($_POST['Name']) && isset($imageName) && isset($_POST['URL']))
            {
                Sponsor::Insert(['name' => $_POST['Name'], 'image' => $imageName, 'sponsor_url' => $_POST['URL'] ]);
            }

            return Redirect::to('/cms_sponsor');
        }
    }

    public function edit(Request $request)
    {
        //authenticatie
        if (!$this->validateUser())
        {
            return Redirect::to('403');
        }
        else
        {
            $rules = array(
                'Image' => 'required | mimes:jpeg,jpg,png',
            );

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                \Session()->flash('msg', 'Dit type bestand mag u niet uploaden! Probeer het nog eens met een .jpeg, .jpg of .png bestand!');
                return Redirect::to('/cms_sponsor');
            }
            $imageName = $request->Image->getClientOriginalName();

            $request->Image->move(public_path('img\Sponsors'), $imageName);

            //validatie
            if (isset($_POST['Name']) && isset($imageName) && isset($_POST['URL']))
            {
                Sponsor::Where('id', '=', $_POST['id'])->update(['name' => $_POST['Name'],
                    'image' => $imageName, 'sponsor_url' => $_POST['URL']]);
            }

            return Redirect::to('/cms_sponsor');
        }
    }

    function editView($sponsorNumber)
    {
        //authenticatie
        if (!$this->validateUser())
        {
            return Redirect::to('403');
        }
        else
        {
            $data = ['number' => $sponsorNumber];
            return view('cms.sponsors.cms_edit_sponsor', $data);
        }
    }

    function delete()
    {
        //authenticatie
        if (!$this->validateUser())
        {
            return Redirect::to('403');
        }
        else
        {
            //validatie
            if (isset($_POST['id']))
            {
                Sponsor::destroy($_POST['id']);
            }

            return Redirect::to('cms_sponsor');
        }
    }
}
