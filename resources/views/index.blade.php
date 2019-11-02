@extends('layouts.app')
@section('form')
    <form method="post" action="">
        <div class="fields">
            <div class="field">
                <p style="margin: 0 0 20px 20px;">
                        <span style="float: left">
                            Light
                        </span>
                    <span style="float: right">
                            <span id="light-min">
                                30
                            </span>
                            -
                            <span id="light-max">
                                300
                            </span>
                            Lux
                        </span>
                </p>
            </div>
            <div class="field">
                <p style="margin: 0 0 20px 20px;">
                        <span style="float: left">
                            Temperature
                        </span>
                    <span style="float: right">
                            <span id="temperature-min">
                                30
                            </span>
                            -
                            <span id="temperature-max">
                                300
                            </span>
                            &#8451;
                        </span>
                </p>
            </div>
            <div class="field">
                <p style="margin: 0 0 20px 20px;">
                        <span style="float: left">
                            Humidity
                        </span>
                    <span style="float: right">
                            <span id="humidity-min">
                                30
                            </span>
                            -
                            <span id="humidity-max">
                                300
                            </span>
                            %
                        </span>
                </p>
            </div>
            <div class="field">
                <p style="margin: 0 0 20px 20px;">
                        <span style="float: left">
                            Soil
                        </span>
                    <span style="float: right">
                            <span id="soil-min">
                                30
                            </span>
                            -
                            <span id="soil-max">
                                300
                            </span>
                        </span>
                </p>
            </div>
            <div class="field">
                <p style="margin: 0 0 20px 20px;">
                        <span style="float: left">
                            moisture
                        </span>
                    <span style="float: right">
                            <span id="moisture-min">
                                30
                            </span>
                            -
                            <span id="moisture-max">
                                300
                            </span>
                        </span>
                </p>
            </div>
        </div>
        <ul class="actions special">
            <li>
                <a href="#" class="button" onclick="getData()" id="retry-btn">
                    <span class="avatar" id="loading-img" style="display: none;">
                        <img src="https://invicdn.worldcdn.net/942527318/http/66.155.22.15/new.p4parking.co.uk/wp-content/themes/cardealer/images/preloader_img/loader.gif.pagespeed.ce.RPg2t-Kw6D.gif" alt="" style="width: 200px; height: 100px"></span>
                    <span id="loading-txt">Retry</span>
                </a>
            </li>
        </ul>
    </form>
@endsection
<script>
    function getData(){

        document.getElementById('loading-img').style.display = "block";
        document.getElementById('loading-txt').style.display = "none";

        axios.get('/api/datamine/1')
            .then(function(response){
                document.getElementById("light-min").innerText = response.data.light[0];
                document.getElementById("light-max").innerText = response.data.light[1];

                document.getElementById("temperature-min").innerText = response.data.temperature[0];
                document.getElementById("temperature-max").innerText = response.data.temperature[1];

                document.getElementById("humidity-min").innerText = response.data.humidity[0];
                document.getElementById("humidity-max").innerText = response.data.humidity[1];

                document.getElementById("soil-min").innerText = response.data.soil[0];
                document.getElementById("soil-max").innerText = response.data.soil[1];

                document.getElementById("moisture-min").innerText = response.data.moisture[0];
                document.getElementById("moisture-max").innerText = response.data.moisture[1];
                console.log(response.data);
            }).catch(function(error){
            console.log(error);
        }).finally(function(){
            console.log("Done");
            document.getElementById('loading-img').style.display = "none";
            document.getElementById('loading-txt').style.display="block";
        })
    }
    getData();
</script>
