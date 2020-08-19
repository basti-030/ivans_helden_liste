@extends('layouts.app')

@section('pagetitle')
    {{ __('Tasks') }}
@endsection

@section('headline')
    {{ __('Monatsaufgaben') }}
@endsection

@section('content')
    <div class="">
        <div>
            <div class="table-responsive">
                <tr>
                    <th>
                        aktueller Monat
                        <select>
                            <option></option>
                        </select>
                    </th>
                    <div>
                        <a href="/">GO TO</a>
                    </div>
                    <div>
                        <a href="">NEW P-KÜRZEL</a>
                    </div>
                    <div>
                        <a href="">SYNC MONTH</a>
                    </div>
            </div>
            </tr>
            <thead>
            <tr>
                <th>Aufgaben
                    <select>
                        <option></option>
                    </select>
                </th>
            </tr>
            <tr>
                <th>Deadline
                    <select>
                        <option></option>
                    </select>
                </th>
            </tr>
            <tr>
                <th>short Description
                    <select>
                        <option></option>
                    </select>
                </th>
            </tr>
            <tr>
                <th>Plan Stunden
                    <select>
                        <option></option>
                    </select>
                </th>
            </tr>
            <tr>
                <th>Plan Stunden
                    <select>
                        <option></option>
                    </select>
                </th>
            </tr>
            <tr>
                <th>Ist Stunden
                    <select>
                        <option></option>
                    </select>
                </th>
            </tr>
            <tr>
                <th>Mitarbeiter
                    <select>
                        <option></option>
                    </select>
                </th>
            </tr>
            <tr>
                <th>Tester
                    <select>
                        <option></option>
                    </select>
                </th>
            </tr>
            <tr>
                <th>Status
                    <select>
                        <option></option>
                    </select>
                </th>
            </tr>
            <tr>
                <th>fortschritt
                    <select>
                        <option></option>
                    </select>
                </th>
            </tr>
            <tr>
                <th>ENDate
                    <select>
                        <option></option>
                    </select>
                </th>
            </tr>
            <tr>
                <th>P-Kürzel
                    <select>
                        <option></option>
                    </select>
                </th>
            </tr>
            <tr>
                <th>P-Kürzel-Nr
                    <select>
                        <option></option>
                    </select>
                </th>
            </tr>
            <tr>
                <th>Abgerechnet
                    <select>
                        <option></option>
                    </select>
                </th>
            </tr>
            <tr>
                <th>Bearbeiten</th>
            </tr>
            </thead>
            <tbody>
            @for($i=0; $i<1000; $i++)

                <td>
                    <tr>
                        $i
                    </tr
                </td>
            @endfor
            </tbody>
        </div>
    </div>
@endsection
