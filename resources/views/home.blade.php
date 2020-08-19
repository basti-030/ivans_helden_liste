@extends('layouts.app')
@section('pagetitle','home ivans_helden_liste')
@section('headline','Home ivans_helden_liste')
@section('content')
<a class="btn btn-danger" href="{{url("/edit")}}">Edit</a>
<a class="btn btn-danger" href="{{url("/tasks")}}">Tasks</a>
@endsection
