@extends('layouts.app')
@section('pagetitle','home ivans_helden_liste')
@section('headline','Home ivans_helden_liste')
@section('content')
<a class="btn btn-danger" href="{{url("/edit")}}">Edit</a>
<a class="btn btn-danger" href="{{url("/tasks")}}">Tasks</a>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
