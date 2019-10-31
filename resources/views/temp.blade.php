<!DOCTYPE HTML>
<!--
	Identity by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>Eco Friend</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <noscript><link rel="stylesheet" href="{{ asset('assets/css/noscript.css') }}" /></noscript>
</head>
<body class="is-preload">
<!-- Wrapper -->
<div id="wrapper">
    <!-- Main -->
    <section id="main">
        <header>
            <span class="avatar"><img src="{{ asset('images/logo.png') }}" alt=""
                                      style="width: 100px; height: 100%"/></span>
            <h1>Eco Friend</h1>
            <p>Your Gardening Instructor</p>
        </header>

        <hr/>
        <form method="post" action="event.preventDefault();">
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
                            &#8451;
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
                            &#8451;
                        </span>
                    </p>
                </div>
            </div>

            <ul class="actions special">
                <li>
                    <a href="#" class="button" onclick="getData()" id="retry-btn">
                        <span class="avatar" id="loading-img" style="display: none;"><img src="https://invicdn.worldcdn.net/942527318/http/66.155.22.15/new.p4parking.co.uk/wp-content/themes/cardealer/images/preloader_img/loader.gif.pagespeed.ce.RPg2t-Kw6D.gif" alt="" style="width: 200px; height: 100%"></span>
                        <span id="loading-txt">Retry</span>
                    </a>
                </li>
            </ul>
        </form>
        {{--        {##}--}}
        {{--        {#        <footer>#}--}}
        {{--            {#            <ul class="icons">#}--}}
        {{--                {#                <li><a href="#" class="icon brands fa-twitter">Twitter</a></li>#}--}}
        {{--                {#                <li><a href="#" class="icon brands fa-instagram">Instagram</a></li>#}--}}
        {{--                {#                <li><a href="#" class="icon brands fa-facebook-f">Facebook</a></li>#}--}}
        {{--                {#            </ul>#}--}}
        {{--            {#        </footer>#}--}}
    </section>

    <!-- Footer -->
    <footer id="footer">
        <ul class="copyright">
            <li><a target="_blank" href="http://tanveer.cf">&copy; Tanveer</a></li>
            <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
        </ul>
    </footer>

</div>

<!-- Scripts -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    function getData(e){

        document.getElementById('loading-img').style.display = "block";
        document.getElementById('loading-txt').style.display = "none";

        axios.get('api/range')
            .then(function(response){
                document.getElementById("light-min").innerText = response.data.light[0];
                document.getElementById("light-max").innerText = response.data.light[1];

                document.getElementById("temperature-min").innerText = response.data.temperature[0];
                document.getElementById("temperature-max").innerText = response.data.temperature[1];

                document.getElementById("humidity-min").innerText = response.data.humidity[0];
                document.getElementById("humidity-max").innerText = response.data.humidity[1];

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
<script>
    if ('addEventListener' in window) {
        window.addEventListener('load', function () {
            document.body.className = document.body.className.replace(/\bis-preload\b/, '');
        });
        document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
    }
</script>

</body>
</html>
