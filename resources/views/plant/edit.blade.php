@extends('layouts.app')
@section('form')
    <h2>Create new Plant!</h2>
    <form method="post" action="{{ route('plant.store') }}">
        <div class="fields">
            <div class="field">
                <input type="text" name="name" value="{{ $plant['name'] }}" placeholder="Name" />
            </div>
            <div class="field">
                <input type="text" name="scientific_name" value="{{ $plant['scientific_name'] }}" placeholder="Scientific Name" />
            </div>
            <div class="field">
                <input type="text" name="kingdom" value="{{ $plant['kingdom'] }}" placeholder="kingdom" />
            </div>
            <div class="field">
                <input type="text" name="sub_kingdom" value="{{ $plant['sub_kingdom'] }}" placeholder="sub kingdom" />
            </div>
            <div class="field">
                <input type="text" name="super_division" value="{{ $plant['super_division'] }}" placeholder="super division" />
            </div>
            <div class="field">
                <input type="text" name="division" value="{{ $plant['division'] }}" placeholder="division" />
            </div>
            <div class="field">
                <input type="text" name="phylum" value="{{ $plant['phylum'] }}" placeholder="phylum" />
            </div>
            <div class="field">
                <input type="text" name="class" value="{{ $plant['class'] }}" placeholder="class" />
            </div>
            <div class="field">
                <input type="text" name="sub_class" value="{{ $plant['sub_class'] }}" placeholder="sub class" />
            </div>
            <div class="field">
                <input type="text" name="order" value="{{ $plant['order'] }}" placeholder="order" />
            </div>
            <div class="field">
                <input type="text" name="family" value="{{ $plant['family'] }}" placeholder="family" />
            </div>
            <div class="field">
                <input type="text" name="genus" value="{{ $plant['genus'] }}" placeholder="genus" />
            </div>
            <div class="field">
                <input type="text" name="species" value="{{ $plant['species'] }}" placeholder="species" />
            </div>
            <div class="field">
                <input type="text" name="variety" value="{{ $plant['variety'] }}" placeholder="variety" />
            </div>
            <div class="field">
                <textarea name="description" value="{{ $plant['description'] }}" placeholder="Description" rows="4"></textarea>
            </div>

        </div>
        <ul class="actions special">
            <li><button type="submit" class="button">Get Started</button></li>
        </ul>
    </form>
    <hr />
@endsection
