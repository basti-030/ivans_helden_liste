@extends('layouts.app')
{{--- Adresse: http://127.0.0.1:8000/tasks -----}}

@section('pagetitle')
    {{ __('Tasks') }}
@endsection

@section('headline')
    {{ __('Monatsaufgaben') }}
@endsection

@section('content')

    <form action="/task" method="get">aktueller Monat
        <select name="sel_month">
            <option value="00">alle Monate</option>
            <option value="01">Januar</option>
            <option value="02">Februar</option>
            <option value="03">März</option>
            <option value="04">April</option>
            <option value="05">Mai</option>
            <option value="06">Juni</option>
            <option value="07">Juli</option>
            <option value="08">August</option>
            <option value="09">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Dezember</option>
        </select>
        <input type="submit" name="to_month" class="btn btn-info" value="GO TO"/>
        <a class="btn btn-info" href="{{url("/new")}}">NEW P-Kürzel</a>
        <a class="btn btn-info" href="{{url("/")}}">SYNC MONTH</a>
    </form>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead>
            <tr>
                <th>Aufgabe</th>
                <th>Deadline</th>
                <th>short Description</th>
                <th>Plan Stunden</th>
                <th>Ist Stunden</th>
                <th>Mitarbeiter</th>
                <th>Tester</th>
                <th>Status</th>
                <th>Fortschritt</th>
                <th>ENDate</th>
                <th>P-Kürzel</th>
                <th>P-Kürzel-Nr</th>
                <th>Abgerechnet</th>
                <th>Bearbeiten</th>
            </tr>
            </thead>
            <tbody>
            @foreach($dbdata as $dbindexdata)
                <tr>
                    <td name="aufgaben">{{$dbindexdata->task}}</td>
                    <td name="deadline">{{$dbindexdata->deadline}}</td>
                    <td name="short-decription">{{$dbindexdata->shortDescription}}</td>
                    <td name="plan-stunden">{{$dbindexdata->estHour}}</td>
                    <td name="ist-stunden">{{$dbindexdata->totalHour}}</td>
                    <td name="mitarbeiter">{{$dbindexdata->developer}}</td>
                    <td name="tester">{{$dbindexdata->tester}}</td>
                    <td name="status">{{$dbindexdata->status}}</td>
                    <td name="fortschritt">{{$dbindexdata->progress}}</td>
                    <td name="ENDate">{{$dbindexdata->EnDate}}</td>
                    <td name="p-kuerzel">{{$dbindexdata->pId}}</td>
                    <td name="P-Kuerzel-Nr">{{$dbindexdata->pIdNr}}</td>
                    <td>

                        <input type="checkbox" id="checkbox" name="abgerechnet">
                        <label for="scales">{{$dbindexdata->KvaId}}</label>

                    </td>
                    <td name="bearbeiten"><a class="btn btn-primary" href="/edit/id/{{$dbindexdata->id}}">edit</a>
                        <a class="btn btn-danger" href="/delete/id/{{$dbindexdata->id}}">delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
