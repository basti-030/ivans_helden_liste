@extends('layouts.app')
@section('pagetitle','Bearbeiten der Aufgabe')
@section('headline','Bearbeiten oder Löschen der Einzelaufgaben')
@section('content')
<form method="post" action="/edit">
    @csrf
    <label for="n">New PKürzel:</label><br>
    <input type="text" id="n" name="ntext" value="Test new">
    <input type="submit" name="new" value="Anlegen"><br>
    <label for="e">Edit PKürzel:</label><br>
    <input type="text"  id="e" name="etext" value="Test edit">
    <input type="submit" name="edit" value="Absenden"><br><br>
    <label for="d">delete PKürzel:</label><br>
    <input type="text" id="d" readonly name="dtext" value="Test delete">
    <input type="hidden" value="1" name="Test hidden id">
    <input type="submit" class="btn btn-danger" name="delete" value="Löschen">
</form>
    <a href="/tasks" class="btn btn-info">back to origin</a>
@endsection
