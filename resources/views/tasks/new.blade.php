@extends('layouts.app')
@section('pagetitle','Neu')
@section('headline','Bearbeiten oder Löschen der Einzelaufgaben')
@section('content')
    <form method="post" action="/new">
        @csrf
        <label for="n">New PKürzel:</label><br>
        <input type="text" id="n" name="ntext" value="">
        <input type="hidden" value="" name="test_hidden_id">
        <input type="submit" name="new" value="Anlegen"><br>
    </form>
    <button class="btn btn-primary"><a href="/task">back to origin</a></button>
@endsection
