<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class DBgetter extends Controller
{
    // ####### Startansicht der index.blade mit allen Daten ##########
    public function getData()
    {
        $dbdata = \App\projectTask::all();
        //dd($dbdata);
        return view('/tasks.index', ['status' => array('dbdata' => $dbdata, 'selectedM' => '')]);
    }

    //########### Ansicht der index.blade wenn Monate ausgewählt wurden (GO TO) auch "alle Monate" ######
    public function selMonth(Request $request, $id = false)
    {
        //dd($request ->Sel_month);
        $selmonth = $request->input('sel_month');
        //dd($selmonth);

    if ($selmonth == '00') {
            //echo "Hallo OO";
            $sel_month = \App\projectTask::all();
        return view('/tasks.index', ['status' => array('dbdata' => $sel_month, 'selectedM' => $selmonth)]);
        }
        elseif ($request->input('to_month')) {
            //echo $selmonth;
            $sel_month = \App\projectTask::where('deadline', '>=', date('Y') . '-' . $selmonth . '-01')
                ->where('deadline', '<', date('Y') . '-' . $selmonth . '-31')
                ->get();
            //dd($sel_month);
            return view('/tasks.index', ['status' => array('dbdata' => $sel_month, 'selectedM' => $selmonth)]);
        }
    }
}
