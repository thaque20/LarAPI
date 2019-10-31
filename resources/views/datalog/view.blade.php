@extends('layouts.app')
@section('form')
    <h2>Datalogs!</h2>
    <form method="post" action="event.preventDefault();">
        @foreach($datalog->toArray() as $key => $value)
            <div class="fields">
                <div class="field">
                    <p style="margin: 0 0 20px 20px;">
                        <span style="float: left">
                            {{ $key }}
                        </span>
                        <span style="float: right">
                            {{ $value }}
                        </span>
                    </p>
                </div>
            </div>
        @endforeach
    </form>
@endsection

