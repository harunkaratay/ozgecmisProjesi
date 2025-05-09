<!DOCTYPE html>
<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Özgeçmiş</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('panel/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
          rel="stylesheet">
    <link href="{{asset('panel/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('panel/vendor/devicons/css/devicons.min.css" rel="stylesheet')}}">
    <link href="{{asset('panel/vendor/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('panel/css/resume.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Start Bootstrap</span>
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{asset('panel/img/kullan.jpeg')}}"
               alt="">
        </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#dashboard">Anasayfa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#education">Egitim</a>
            </li>
        </ul>
    </div>
</nav>
<!-- Hava Durumu -->
<div id="weather-info"
     style="position: fixed; top: 10px; right: 10px; z-index: 1050; background-color: rgba(255,255,255,0.8); padding: 10px; border-radius: 8px; box-shadow: 0 0 5px rgba(0,0,0,0.2);">
    <p>Hava Durumu :</p>
    <div id="weather-content">Yükleniyor...</div>
</div>
<!-- Hava Durumu Bitti -->

<div class="container-fluid p-0"> @yield('content')</div>

<!-- Bootstrap core JavaScript -->
<script src="{{asset('panel/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('panel/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Plugin JavaScript -->
<script src="{{asset('panel/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for this template -->
<script src="{{asset('panel/js/resume.min.js')}}"></script>

<!-- Hava durumu api -->
<script>
    async function fetchWeather() {
        const apiKey = '0f6cd3e6244627207bc29ad8fc3b73eb';
        const city = 'Elazig';
        const url = `https://api.openweathermap.org/data/2.5/weather?q=${city}&units=metric&lang=tr&appid=${apiKey}`;

        try {
            const response = await fetch(url);
            const data = await response.json();
            const temp = data.main.temp;
            const desc = data.weather[0].description;
            document.getElementById('weather-content').innerHTML = `${city}: ${temp}°C, ${desc}`;
        } catch (error) {
            document.getElementById('weather-content').innerHTML = 'Veri alınamadı';
            console.error(error);
        }
    }
    fetchWeather();
</script>

</body>

</html>
