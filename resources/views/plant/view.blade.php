@extends('layouts.app')
@section('form')
    <h2>Plants!</h2>
    <div>
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
            <br>

        @endforeach
    </div>
    <ul class="actions special">
        <li>
            <button class="button">
                <a  href="{{ route('plants.edit', $plant['id']) }}">
                    Edit Plant

                </a>
            </button>
        </li>
        <li>
            <form id="delete-form" method="post" action="{{ route('plant.destroy', $plant['id']) }}" style="display: none;">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            </form>
            <button onclick="
                        if(!confirm('Are you sure, you want to delete this?')){
                        } else {
                            console.log('working');
                            $('form').submit();
                        }
                        "
                    class="button" id="delete-btn">
                Delete Plant
            </button>

        </li>
    </ul>
    <ul class="actions special">
        <li>
            <a href="{{ route('plants.log', $plant['id']) }}" class="button">
                View Datalog
            </a>
        </li>
    </ul>
@endsection

