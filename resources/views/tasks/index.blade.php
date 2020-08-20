@extends('layouts.app')

@section('pagetitle')
    {{ __('Tasks') }}
@endsection

@section('headline')
    {{ __('Monatsaufgaben') }}
@endsection

@section('content')
    <div>aktueller Monat
        <select>
            <option value="1">Januar</option>
            <option value="1">Februar</option>
            <option value="1">März</option>
            <option value="1">April</option>
            <option value="1">Mai</option>
            <option value="1">Juni</option>
            <option value="1">Juli</option>
            <option value="1">August</option>
            <option value="1">September</option>
            <option value="1">Oktober</option>
            <option value="1">November</option>
            <option value="1">Dezember</option>
        </select>
        <a class="btn btn-info" href="{{url("/")}}">GO TO</a>
        <a class="btn btn-info" href="{{url("/new")}}">NEW P-Kürzel</a>
        <a class="btn btn-info" href="{{url("/")}}">SYNC MONTH</a>
    </div>
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
            @for($i=0;$i<10;$i++)
                <tr>
                    <td name="aufgaben">Hallo</td>
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
                    <td name="P-Kuerzel-Nr">Hallo</td>
                    <td>
                        <input type="checkbox" id="checkbox" name="abgerechnet">
                        <label for="scales">Abgerechnet</label>
                    </td>
                    <td name="bearbeiten"><a class="btn btn-primary" href="/edit/id/{{$i}}">edit</a>
                        <a class="btn btn-danger" href="/delete/id/{{$i}}">delete</a>
                    </td>
                </tr>
            @endfor
            </tbody>
        </table>
    </div>

@endsection
