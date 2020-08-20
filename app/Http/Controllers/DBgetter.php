<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DBgetter extends Controller
{
    //
    public function getData()
    {
        $dbdata = \App\projectTask::all();
        //dd($dbdata);
        return view('/tasks.index',['dbdata'=>$dbdata]);

        /*$dbdatacount = count($dbdata);
        //dd($dbdatacount);
        for ($ii=0; $ii<$dbdatacount; $ii++){
            $deadline = $dbdata[$ii]['deadline'];
            //dd($deadline);
            return view('tasks.index',['dbdata'=>$dbdata]);
        }*/

/*return view('tasks.index',['deadline'=>$deadline]);*/
    }
}
/*<td name="aufgaben">Hallo</td>
                    <td name="deadline">Hallo</td>
                    <td name="short-decription">Hallo</td>
                    <td name="plan-stunden">Hallo</td>
                    <td name="ist-stunden">Hallo</td>
                    <td name="mitarbeiter">Hallo</td>
                    <td name="tester">Hallo</td>
                    <td name="status">Hallo</td>
                    <td name="fortschritt">Hallo</td>
                    <td name="ENDate">Hallo</td>
                    <td name="p-kuerzel">Hallo</td>
                    <td name="P-Kuerzel-Nr">Hallo</td>*/
