@extends('layouts.app')
@section('form')
    <h2>Plants!</h2>
    <ol id="plant-list">

    </ol>
@endsection

@section('script')

    <script>
        axios.get('api/plant')
            .then(function(response){
                var plants = response.data;
                var list = "";
                plants.forEach(function(plant){
                    list += `<li><a href="plant/${plant['id']}"> ${plant['name']} </a></li>`;
                });
                if(list === ""){
                    document.getElementById('plant-list').innerHTML = "<p>Empty</p>";

                } else {
                    document.getElementById('plant-list').innerHTML = list;
                }
            })
            .catch(function (error) {
                console.log("error: ", error);
            });


    </script>
@endsection
