@extends('layouts.app')
@section('form')
    <h2>Plants!</h2>
    <form method="post" action="event.preventDefault();">
        @foreach($plant->toArray() as $key => $value)
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
            <ul class="actions special">
                <li>
                    <a href="{{ route('plants.log', $plant['id']) }}" class="button">
                        View Datalog
                    </a>
                </li>
            </ul>
    </form>
@endsection

