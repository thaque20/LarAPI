@extends('layouts.app')
@section('form')
    <h2>Datalogs!</h2>
    <ol id="datalog-list">
    </ol>
@endsection

@section('script')

    <script>
        axios.get('api/datalog')
            .then(function(response){
                var datalogs = response.data;
                var list = "";
                datalogs.forEach(function(datalog){
                    list += `<li><a href="datalog/${datalog['id']}"> ${datalog['created_at']} </a></li>`;
                    console.log(datalog);
                });
                if(list === ""){
                    document.getElementById('datalog-list').innerHTML = "<p>Empty</p>";

                } else {
                    document.getElementById('datalog-list').innerHTML = list;
                }
                console.log(response.data);
            })
            .catch(function (error) {
                console.log("error: ", error);
            });


    </script>
@endsection
