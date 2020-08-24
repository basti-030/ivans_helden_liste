<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class DBgetter extends Controller
{
    //
    public function getData()
    {
        $dbdata = \App\projectTask::all();
        //dd($dbdata);
        return view('/tasks.index', ['dbdata' => $dbdata]);

    }

    public function selMonth(Request $request, $id = false)
    {
        //dd($request ->Sel_month);
        $selmonth = $request->input('sel_month');
        //dd($selmonth);
        if ($request->input('to_month')) {
            echo $selmonth;
            $sel_month = \App\projectTask::where('deadline', '>=', date('Y') . '-' . $selmonth . '-01')
                ->where('deadline', '<', date('Y') . '-' . $selmonth . '-31')
                ->get();
            //dd($sel_month);
            return view('/tasks.index', ['dbdata' => $sel_month]);
        } elseif ($selmonth = '00') {
            echo "Hallo OO";
            $sel_month = \App\projectTask::all();
            return view('/tasks.index', ['dbdata' => $sel_month]);
        }


    }
}
