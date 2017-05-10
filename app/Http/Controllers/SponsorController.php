<?php

namespace App\Http\Controllers;

use App\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SponsorController extends Controller
{
    public function create()
    {
        return view('cms.sponsors.cms_new_sponsor');
    }

    public function newSponsor()
    {
        Sponsor::Insert(['name' => $_POST['Name'], 'image' => $_POST['Image'], 'sponsor_url' => $_POST['URL'] ]);

        return Redirect::to('/cms_sponsor');
    }
}
