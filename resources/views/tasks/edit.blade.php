@extends('layouts.app')
@section('pagetitle','Bearbeiten der Aufgabe')
@section('headline','Bearbeiten der Einzelaufgaben')
@section('content')
<form method="post" action="/tasks">
    @csrf
    <label for="e">Edit PKürzel:</label><br>
    <input type="text"  id="e" name="etext" value="test_edit">
    <input type="hidden" value="{{$status['data']->id}}" name="test_hidden_id">
    <input type="submit" name="edit" value="Absenden"><br><br>
</form>
<a href="/tasks" class="btn btn-info">back to origin</a>
@endsection
