@extends('layouts.app')
@section('form')
    <h2>Extra Stuff!</h2>
    <form method="post" action="#">
        <div class="fields">
            <div class="field">
                <input type="text" name="name" placeholder="Name" />
            </div>
            <div class="field">
                <input type="text" name="scientific_name" placeholder="Scientific Name" />
            </div>
            <div class="field">
                <input type="text" name="kingdom" placeholder="kingdom" />
            </div>
            <div class="field">
                <input type="text" name="sub_kingdom" placeholder="sub kingdom" />
            </div>
            <div class="field">
                <input type="text" name="super_division" placeholder="super division" />
            </div>
            <div class="field">
                <input type="text" name="division" placeholder="division" />
            </div>
            <div class="field">
                <input type="text" name="phylum" placeholder="phylum" />
            </div>
            <div class="field">
                <input type="text" name="class" placeholder="class" />
            </div>
            <div class="field">
                <input type="text" name="sub_class" placeholder="sub class" />
            </div>
            <div class="field">
                <input type="text" name="order" placeholder="order" />
            </div>
            <div class="field">
                <input type="text" name="family" placeholder="family" />
            </div>
            <div class="field">
                <input type="text" name="genus" placeholder="genus" />
            </div>
            <div class="field">
                <input type="text" name="species" placeholder="species" />
            </div>
            <div class="field">
                <input type="text" name="variety" placeholder="variety" />
            </div>
            <div class="field">
                <textarea name="description" placeholder="Description" rows="4"></textarea>
            </div>
            <div class="field">
                <input type="checkbox" id="human" name="human" /><label for="human">I'm a human</label>
            </div>

        </div>
        <ul class="actions special">
            <li><a href="#" class="button">Get Started</a></li>
        </ul>
    </form>
    <hr />
@endsection
