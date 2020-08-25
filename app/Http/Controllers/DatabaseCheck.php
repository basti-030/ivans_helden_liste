<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class DatabaseCheck extends Controller
{
/*########### Edit Function ###########*/
    public function editData(Request $request, $id=false)
    {
        if($id)
        {
            $row = \App\projectTask::find($id);
            return view('tasks.edit', ['status' => array('status' => '', 'data' => $row)]);
        }

        if($request->input('edit'))
        {
            $editWorker = \App\projectTask::find($request->input('test_hidden_id'));
            $editWorker->pIdNr =$request->input('etext');
            $editWorker->save();
        }
        $results = \App\projectTask::all();
        return redirect()->route('index');
    }
/*################# New Function ####################*/
    public function newData(Request $insert)
    {

        if($insert->input('new'))
        {
            $insertNew = new \App\projectTask();
            $insertNew->pIdNr = $insert->input('ntext');
            $insertNew->save();
            return redirect()->route('edit');
        }
        return view('tasks.new', ['status' => array('status' => '', 'data' => "")]);

    }
/*################ Delete Function ##################*/
    public function deleteData(Request $request, $id = false)
    {
        if($id)
        {
            $delete = \App\projectTask::find($id);
            return view('tasks.delete', ['status' => array('status' => '', 'data' => $delete)]);

        }
        //if($request->id)
        if ($request->input('delete'))
        {
            $delete = \App\projectTask::find($request->input('test_hidden_id'));
            $delete->pIdNr =$request->input('dtext');
            $delete->delete();
        }
        return redirect()->route('index');
    }
}
