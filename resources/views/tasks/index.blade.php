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
            <option></option>
        </select>
        <a class="btn btn-info" href="{{url("/")}}">GO TO</a>
        <a class="btn btn-info" href="{{url("/")}}">NEW P-Kürzel</a>
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
                    <td <div>
                        <input type="checkbox" id="checkbox" name="abgerechnet"
                               >
                        <label for="scales">Abgerechnet</label>
                    </div></td>
                    <td name="bearbeiten"><a class="btn btn-primary" href="/edit">edit</a></td>
                </tr>
            @endfor
            </tbody>
        </table>
    </div>

@endsection
