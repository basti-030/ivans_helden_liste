<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class DBgetter extends Controller
{
// ---------- Startansicht der index.blade mit allen Daten ------------------------------------------------------------

    public function getData()
    {
        $dbdata = \App\projectTask::all();
        return view('/tasks.index', ['status' => array('dbdata' => $dbdata, 'selectedM' => '')]);
    }

// ----------- Ansicht der index.blade wenn einzelne oder alle Monate über "GO TO" ausgewählt wurden ------------------
    public function selMonth(Request $request, $id = false)
    {
        $selmonth = $request->input('sel_month');

        if ($selmonth == '00') {
            $sel_month = \App\projectTask::all();
            return view('/tasks.index', ['status' => array('dbdata' => $sel_month, 'selectedM' => $selmonth)]);
        } elseif ($request->input('to_month')) {
            //echo $selmonth;
            $sel_month = \App\projectTask::where('deadline', '>=', date('Y') . '-' . $selmonth . '-01')
                ->where('deadline', '<=', date('Y') . '-' . $selmonth . '-31')
                ->get();
            return view('/tasks.index', ['status' => array('dbdata' => $sel_month, 'selectedM' => $selmonth)]);
        }
    }

//------------- holt die json-Daten mit der $searchPIDNr(= pIdNr) ab und konvertiert in $jsondata-Array ---------------
    public function jsontodata($searchPIDNr)
    {
        $response = Http::withHeaders([
            "Content-Type" => "application/json",
            "Authorization" => "Basic Y29kZUB6ZW50cmFsd2ViLmRlOm1qaFVrRjlTNmRjdnhpRGxveGhCRkMwMQ=="
        ])->get('https://zentralweb.atlassian.net/rest/agile/1.0/issue/' . $searchPIDNr);
        $json = json_encode($response->json());
        return $jsondata = json_decode($json, true);
    }

// ----------- befüllt die Datenbank mit den Daten aus dem $jsondate (Auswahl nach Monaten weiter unten --------------
    public function syncfill($syncWorker, $jsondata)
    {
        if ($jsondata['key'] == $syncWorker->pIdNr) {

// >->->-> wenn Fehler mit nicht vorhandenen properties auftreten, müssen die unten stehenden Zuweisungen jeweils nach dem if(!isset)..else... Schema umgebaut werden
// - in den Klammern sind jeweils die Pfade der JSON-Struktur -------------------------------------------------------.
// - Task ------------------------------------------------------------------------------------------------------------
            $syncWorker->task = $jsondata['fields']['project']['name'];
// - Deadline --------------------------------------------------------------------------------------------------------
            $syncWorker->deadline = $jsondata['fields']['duedate'];
// - Short Description -----------------------------------------------------------------------------------------------
            $syncWorker->shortDescription = $jsondata['fields']['summary'];
// - estimate Hours --------------------------------------------------------------------------------------------------
            $syncWorker->estHour = $jsondata['fields']['aggregatetimeoriginalestimate'];
// - total hour ------------------------------------------------------------------------------------------------------
            if (!isset($jsondata['fields']['timetracking']['timeSpentSeconds'])) {
                $syncWorker->totalHour = 'no Data';
            } else {
                $syncWorker->totalHour = $jsondata['fields']['timetracking']['timeSpentSeconds'];
            }
// - developer -------------------------------------------------------------------------------------------------------
            if (!isset($jsondata['fields']['assignee']['displayName'])) {
                $syncWorker->developer = 'no Data';
            } else {
                $syncWorker->developer = $jsondata['fields']['assignee']['displayName'];
            }
// - tester ----------------------------------------------------------------------------------------------------------
            if (!isset($jsondata['fields']['customfield_11008']['displayName'])) {
                $syncWorker->tester = 'no Data';
            } else {
                $syncWorker->tester = $jsondata['fields']['customfield_11008']['displayName'];
            }
// - status ----------------------------------------------------------------------------------------------------------
            $syncWorker->status = $jsondata['fields']['status']['name'];
// - progress --------------------------------------------------------------------------------------------------------
            if (!isset($jsondata['fields']['progress']['percent'])) {
                $syncWorker->progress = $jsondata['fields']['progress']['progress'];
            } else {
                $syncWorker->progress = $jsondata['fields']['progress']['percent'];
            }
// - EndDate ---------------------------------------------------------------------------------------------------------
            $syncWorker->EnDate = $jsondata['fields']['customfield_10206'];
// - ProjektID -------------------------------------------------------------------------------------------------------
            $syncWorker->pId = $jsondata['fields']['project']['name'];
// - ProjektID-Nr ----------------------------------------------------------------------------------------------------
            $syncWorker->pIdNr = $jsondata['key'];
// - KVA ID ----------------------------------------------------------------------------------------------------------
            $syncWorker->KvaId = $jsondata['fields']['status']['name'];
// -------------------------------------------------------------------------------------------------------------------
            $syncWorker->save();
        }
    }

// --------- Syncronisation für alles per Monat oder alle Monate -----------------------------------------------------

    public function dbSyncAll(Request $request, $id = false)
    {
        // in der Index.blade (62) wird der ausgewählte Monat übergeben und hier als $selmonth abgefragt
        $selmonth = $request->input('syncall_hidden_month_id');

// - etweder sind alle Monate ausgewählt (00 oder null) oder "else" ein bestimmter Monat -----------------------------
        if ($selmonth == '00' or $selmonth == null) {
            $sel_month = \App\projectTask::all();
            $keys = $sel_month->modelKeys(); //holt die primarykeys aus der project_tasks Tabelle

            foreach ($keys as $key) {
                $searchPIDNr = \App\projectTask::find($key)->pIdNr;
                $jsondata = $this->jsontodata($searchPIDNr); // function jsontodata siehe oben
                $syncWorker = \App\projectTask::find($key);
                $this->syncfill($syncWorker, $jsondata); // function syncfill siehe oben
            }
            return redirect()->route('index');
 // - einzelne Monate sind ausgewählt und werden syncronisiert -------------------------------------------------------
        } else {
            $sel_month = \App\projectTask::where('deadline', '>=', date('Y') . '-' . $selmonth . '-01')
                ->where('deadline', '<=', date('Y') . '-' . $selmonth . '-31')
                ->get();
            $keys = $sel_month->modelKeys(); //holt die primarykeys aus der Tabelle

            foreach ($keys as $key) {
                $searchPIDNr = \App\projectTask::find($key)->pIdNr;
                $jsondata = $this->jsontodata($searchPIDNr); // function jsontodata siehe oben

                $syncWorker = \App\projectTask::find($key);
                $this->syncfill($syncWorker, $jsondata); // function syncfill siehe oben
            }
            return redirect()->route('index');
        }
    }

// --------- Syncronisation für einzelne Aufgabe über einen Button am Ende der Zeile, index.blade (112) --------------
    public function dbSync(Request $request, $id = false)
    {
        $searchPIDNr = $request->input('sync_hidden_id');

        if ($request->input('sync')) {
            $jsondata = $this->jsontodata($searchPIDNr); // function jsontodata siehe oben
            $syncWorker = \App\projectTask::where('pIdNr', '=', $request->input('sync_hidden_id'))->first();
            $this->syncfill($syncWorker, $jsondata); // function syncfill siehe oben
        }
        return redirect()->route('index');
    }
}

