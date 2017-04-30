<?php

namespace App\Http\Controllers;

use App\Course;
use App\IndividualReservation;
use App\Technique;
use App\Table;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    private $data = [];

    function show()
    {
        $this->data = [];
        // retrieves all tables and techniques
        $this->data['tables'] = $this->tableConverter(Table::orderBy('technique_id', 'asc')->orderBy('id', 'asc')->get());
        $this->data['techniques'] = Technique::orderBy('name', 'asc')->get();

        // time limitation for longterm efficiency.
        $this->data['reservations'] = $this->reservationsConverter(IndividualReservation::where([
            ['start_date', '>', Date('Y-m-d H:i:s', strtotime('-1 month'))],
            ['start_date', '<', Date('Y-m-d H:i:s', strtotime('+1 month'))],
        ])->get());

        $this->data['workshops'] = $this->workshopsConverter(Course::where([
            ['start_date', '>', Date('Y-m-d H:i:s', strtotime('-1 month'))],
            ['start_date', '<', Date('Y-m-d H:i:s', strtotime('+1 month'))],
        ])->get());

        return view('agenda', $this->data);
    }


    private function reservationsConverter($list)
    {

        $newData = [];
        $x = 0;
        foreach ($list as $item) {
            $newItem = [
                'start_date' => $item->start_date,
                'end_date' => $item->end_date,
                'text' => "Gereserveerd door: " . $item->user->name,
                'type' => $item->table_id,
	            'color' => "#009966",
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
                'label' => $item->tech->name." ".$item->id];
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
                $tables = $item->tables;
                $tableID = "";
                foreach ($tables as $table) {
                    $tableID = $tableID.$table->id.",";
                }
                // prevents corupted week overview on the webpage.
                if ($tableID == "") {
                    foreach ($this->data['tables'] as $table) {
                        $tableID = $tableID.$table['key'].",";
                    }
                }
	            $tableID = rtrim($tableID,",");
                $newItem = [
                    'start_date' => $item->start_date,
                    'end_date' => $item->end_date,
                    'text' => "Workshop: " . $item->name,
                    'type' => $tableID,
	                'color' => "#FF9933",
                ];
                $newData[$x] = $newItem;
                $x++;
            }
        }

        return $newData;
    }

}
