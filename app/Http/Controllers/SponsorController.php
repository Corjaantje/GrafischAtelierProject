<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sponsor;
use Illuminate\Support\Facades\Redirect;
use Auth;

class SponsorController extends Controller
{
    //
    function deleteAction()
    {
        Sponsor::destroy($_POST['id']);
        return Redirect::to('cms_sponsor');
    }
}
