<!DOCTYPE HTML>
<html>
<head>
    <title>Eco Friend</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <noscript><link rel="stylesheet" href="{{ asset('assets/css/noscript.css') }}" /></noscript>
    <link href="{{ asset('images/logo.png') }}" rel="icon" />
</head>
<body class="is-preload">

<div id="wrapper">
    <!-- Main -->
    <section id="main">
        <header>
            <a href="{{ url('/') }}">
                <span class="avatar">
                    <img src="{{ asset('images/logo.png') }}" alt=""
                                          style="width: 100px; height: 100%"/>
                </span>
            </a>
            <h1>Eco Friend</h1>
            <p>Your Gardening Instructor</p>
            <ul class="actions special">
                <li>
                    <a href="{{ route('home') }}" class="button">
                        Environment
                    </a>
                </li>
                <li>
                    <a href="{{ route('plants.index') }}" class="button">
                        Plant
                    </a>
                </li>
                <li>
                    <a href="{{ route('datalogs.index') }}" class="button">
                        Data
                    </a>
                </li>
            </ul>
        </header>

        <hr/>
            @section('form')
                @show
    </section>
</div>
    <!-- Scripts -->
{{--    <script>--}}
{{--        function getData(e){--}}

{{--            document.getElementById('loading-img').style.display = "block";--}}
{{--            document.getElementById('loading-txt').style.display = "none";--}}

{{--            axios.get('api/range')--}}
{{--                .then(function(response){--}}
{{--                    document.getElementById("light-min").innerText = response.datalog.light[0];--}}
{{--                    document.getElementById("light-max").innerText = response.datalog.light[1];--}}

{{--                    document.getElementById("temperature-min").innerText = response.datalog.temperature[0];--}}
{{--                    document.getElementById("temperature-max").innerText = response.datalog.temperature[1];--}}

{{--                    document.getElementById("humidity-min").innerText = response.datalog.humidity[0];--}}
{{--                    document.getElementById("humidity-max").innerText = response.datalog.humidity[1];--}}

{{--                    document.getElementById("moisture-min").innerText = response.datalog.moisture[0];--}}
{{--                    document.getElementById("moisture-max").innerText = response.datalog.moisture[1];--}}
{{--                    console.log(response.datalog);--}}
{{--                }).catch(function(error){--}}
{{--                console.log(error);--}}
{{--            }).finally(function(){--}}
{{--                console.log("Done");--}}
{{--                document.getElementById('loading-img').style.display = "none";--}}
{{--                document.getElementById('loading-txt').style.display="block";--}}
{{--            })--}}
{{--        }--}}
{{--        getData();--}}
{{--    </script>--}}
    <script>
        if ('addEventListener' in window) {
            window.addEventListener('load', function () {
                document.body.className = document.body.className.replace(/\bis-preload\b/, '');
            });
            document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
        }
    </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    @section('script')
        @show
</body>
</html>
