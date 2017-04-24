<?php

namespace App\Http\Controllers;

use App\Course;
use App\IndividualReservation;
use App\Technique;
use App\Table;
use Illuminate\Http\Request;

class AgendaController extends Controller
{

    function show()
    {
        $data = [];
        // retrieves all tables and techniques
        $data['tables'] = Table::orderBy('technique_id', 'asc')->orderBy('table_number', 'asc')->get();
        $data['techniques'] = Technique::orderBy('name', 'asc')->get();

        // time limitation for longterm efficiency.
        $data['reservations'] = IndividualReservation::where([
            ['start_time', '>', Date('Y-m-d H:i:s', strtotime('-1 month'))],
            ['start_time', '<', Date('Y-m-d H:i:s', strtotime('+1 month'))],
        ])->get();

        $data['workshops'] = Course::where([
            ['start_date', '>', Date('Y-m-d H:i:s', strtotime('-1 month'))],
            ['start_date', '<', Date('Y-m-d H:i:s', strtotime('+1 month'))],
        ])->get();

        return view('agenda', $data);
    }
}