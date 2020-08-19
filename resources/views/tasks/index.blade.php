@extends('layouts.app')

@section('title')
    {{ __('Tasks') }}
@endsection

@section('headline')
    {{ __('Table') }}
@endsection

@section('content')
    @include('tasks.details', array('tasks'=>'...'))
@endsection
