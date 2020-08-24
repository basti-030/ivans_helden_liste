@extends('layouts.app')
@section('pagetitle','Löschen')
@section('headline','Bearbeiten oder Löschen der Einzelaufgaben')
@section('content')
<form method="post" action="/delete">
    @csrf
    <label for="d">delete PKürzel:</label><br>
    <input type="text" id="d" readonly name="dtext" value="{{$status['data']->pIdNr}}">
    <input type="hidden" value="{{$status['data']->id}}" name="test_hidden_id">
    <input type="submit" class="btn btn-danger" name="delete" value="Löschen">
</form>
<a href="/tasks" class="btn btn-info">back to origin</a>
@endsection
