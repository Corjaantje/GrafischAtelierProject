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
        $data['tables'] = $this->tableConverter(Table::orderBy('technique_id', 'asc')->orderBy('table_number', 'asc')->get());
        $data['techniques'] = Technique::orderBy('name', 'asc')->get();

        // time limitation for longterm efficiency.
        $data['reservations'] = $this->reservationsConverter(IndividualReservation::where([
            ['start_date', '>', Date('Y-m-d H:i:s', strtotime('-1 month'))],
            ['start_date', '<', Date('Y-m-d H:i:s', strtotime('+1 month'))],
        ])->get());

        $data['workshops'] = $this->workshopsConverter(Course::where([
            ['start_date', '>', Date('Y-m-d H:i:s', strtotime('-1 month'))],
            ['start_date', '<', Date('Y-m-d H:i:s', strtotime('+1 month'))],
        ])->get());

        return view('agenda', $data);
    }


    private function reservationsConverter($list)
    {

        $newData = [];
        $x = 0;
        foreach ($list as $item) {
            $newItem = [
                'start_date' => $item->start_date,
                'end_date' => $item->end_date,
                'text' => $item->user->name,
                'type' => $item->id,
            ];
            $newData[$x] = $newItem;
            $x++;
        }

        return $newData;
    }


    private function tableConverter($listTable)
    {

        $newData = [];
        $x = 0;
        foreach ($listTable as $item) {
            $newItem = [
                'key' => $item->id,
                'label' => $item->tech->name];
            $newData[$x] = $newItem;
            $x++;
        }


        return $newData;
    }


    private function workshopsConverter($list)
    {

        $newData = [];
        $x = 0;
        foreach ($list as $item) {
            if ($item->visible) {
                $newItem = [
                    'start_date' => $item->start_date,
                    'end_date' => $item->end_date,
                    'text' => $item->name,
                    'type' => $item->id,
                ];
                $newData[$x] = $newItem;
                $x++;
            }
        }

        return $newData;
    }

}
