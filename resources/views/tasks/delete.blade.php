@extends('layouts.app')
@section('pagetitle','Löschen')
@section('headline','Bearbeiten oder Löschen der Einzelaufgaben')
@section('content')
<form method="post" action="/delete">
    @csrf
    <label for="d">delete PKürzel:</label><br>
    <input type="text" id="d" readonly name="dtext" value="test_delete">
    <input type="hidden" value="1" name="test_hidden_id">
    <input type="submit" class="btn btn-danger" name="delete" value="Löschen">
    <button class="btn btn-primary"><a href="/task">back to origin</a></button>
</form>
