<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class SessionController extends Controller
{
    // stap 1
    public function storeType(Request $request)
    {
        if (isset($_POST['btnWorkshop']))
        {
            $type = $request->get('workshop');
        }
        else
        {
           $type = $request->get('cursus');
        }
        echo $type;
    }

    // stap 4
    public function storeDateTime(Request $request)
    {
        $date = $request->get('date');
        $time = $request->get('start_time');
        echo $date;
        echo "<br />";
        echo $time;
    }
}
