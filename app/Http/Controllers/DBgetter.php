<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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
        //dd($request ->sel_month);
        $selmonth = $request->input('sel_month');
        //dd($selmonth);

        if ($selmonth == '00') {
            //echo "Hallo OO";
            $sel_month = \App\projectTask::all();
            return view('/tasks.index', ['status' => array('dbdata' => $sel_month, 'selectedM' => $selmonth)]);
        } elseif ($request->input('to_month')) {
            //echo $selmonth;
            $sel_month = \App\projectTask::where('deadline', '>=', date('Y') . '-' . $selmonth . '-01')
                ->where('deadline', '<=', date('Y') . '-' . $selmonth . '-31')
                ->get();
            //dd($sel_month);
            return view('/tasks.index', ['status' => array('dbdata' => $sel_month, 'selectedM' => $selmonth)]);
        }
    }

    public function dbSync(Request $request, $id = false)
    {
        //dd($request->input('sync_hidden_id'));
        $response = Http::withHeaders([
            "Content-Type" => "application/json",
            "Authorization" => "Basic Y29kZUB6ZW50cmFsd2ViLmRlOm1qaFVrRjlTNmRjdnhpRGxveGhCRkMwMQ==",
            $searchPIDNr = $request->input('sync_hidden_id'),
            //dd($searchPIDNr),
        ])
            ->get('https://zentralweb.atlassian.net/rest/agile/1.0/issue/' . $searchPIDNr);
        //dd('https://zentralweb.atlassian.net/rest/agile/1.0/issue/' . $searchPIDNr);
        $json = json_encode($response->json());
        $jsondata = json_decode($json, true);

        //dd($jsondata);
        //dd($jsondata['key']);
        if ($request->input('sync')) {
            $syncWorker = \App\projectTask::where('pIdNr','=', $request->input('sync_hidden_id'))->first();
            //dd($request->input('sync_hidden_id'));
            //dd($syncWorker);
            //$syncWorker->pIdNr = $searchPIDNr;
            //dd($syncWorker);
            if ($jsondata['key'] == $syncWorker->pIdNr) {

                //dd($id);
                //dd($jsondata[0]); // zeigt bei Bedarf den Array der Json bei index 0 an
                //dd($jsondata[0]->_id); // zeigt bei Bedarf die ID des Arrays bei index 0 an

                //dd($syncWorker);
                //$dbID = $syncWorker->pIdNr; //holt die pIdNr der projektTasks-DB ab
                //dd($dbID);
// ### Task ####################
                $syncWorker->task = $jsondata['fields']['project']['name'];
                //dd($syncWorker->tasks);
// ### Deadline ##################
                $syncWorker->deadline = $jsondata['fields']['duedate'];
// ### Short Description #################
                $syncWorker->shortDescription = $jsondata['fields']['summary'];
// ### estimate Hours #####################
                $syncWorker->estHour = $jsondata['fields']['aggregatetimeoriginalestimate'];
// ### total hour ##################
                if (!isset($jsondata['fields']['timetracking']['timeSpentSeconds'])) {
                    $syncWorker->totalHour = 'no Data';
                } else {
                    $syncWorker->totalHour = $jsondata['fields']['timetracking']['timeSpentSeconds'];
                }
// ### developer ###################
                if (!isset($jsondata['fields']['assignee']['displayName'])) {
                    $syncWorker->developer = 'no Data';
                } else {
                    $syncWorker->developer = $jsondata['fields']['assignee']['displayName'];
                }
// ### tester #####################
                if (!isset($jsondata['fields']['customfield_11008']['displayName'])) {
                    $syncWorker->tester = 'no Data';
                } else {
                    $syncWorker->tester = $jsondata['fields']['customfield_11008']['displayName'];
                }
// ### status #####################
                $syncWorker->status = $jsondata['fields']['status']['name'];
// ### progress ###################
                if (!isset($jsondata['fields']['progress']['percent'])) {
                    $syncWorker->progress = $jsondata['fields']['progress']['progress'];
                } else {
                    $syncWorker->progress = $jsondata['fields']['progress']['percent'];
                }
// ### EndDate #####################
                $syncWorker->EnDate = $jsondata['fields']['customfield_10206'];
// ### ProjektID ##################
                $syncWorker->pId = $jsondata['fields']['project']['name'];
// ### ProjektID-Nr ###############
                $syncWorker->pIdNr = $jsondata['key'];
// ### KVA ID ####################
                $syncWorker->KvaId = $jsondata['fields']['status']['name'];

                $syncWorker->save();
            }
        }
        //dd($jsondata);
        return redirect()->route('index');
    }
}

