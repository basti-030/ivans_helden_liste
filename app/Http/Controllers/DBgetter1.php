@php $aufgabe = getOne(SELECT 'task' FROM 'project_task' WHERE id= $i); @endphp
dd($aufgabe)
public function editData(Request $request, $worker_ID = false)
