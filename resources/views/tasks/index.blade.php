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
        <form method="post" action="">
            <button>GO TO</button>
        </form>
        <form method="post" action="">
            <button>NEW P-KÜRZEL</button>
        </form>
        <form method="post" action="">
            <button>SYNC MONTH</button>
        </form>
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
                    <td name="aufgabe">Hallo</td>
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
                    <td name="abgerechnet">Hallo</td>
                    <td name="bearbeiten"><a href="/edit">edit</a></td>
                </tr>
            @endfor
            </tbody>
        </table>
    </div>

@endsection
