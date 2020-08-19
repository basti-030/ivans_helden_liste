@extends('layouts.app')

@section('title')
    <p class="title">{{ __('Projects') }}</p>
@endsection

@section('content')
    @include('tasks.details', array('tasks'=>'...'))
@endsection
