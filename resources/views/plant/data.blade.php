@extends('layouts.app')
@section('form')
    <h2>Datalogs!</h2>
    <ol id="datalog-list">
        @foreach($plantlog as $log)
            <li><a href="{{ route('datalogs.view', $log['id']) }}"> {{$log['created_at']}} </a></li>
        @endforeach
    </ol>
@endsection

