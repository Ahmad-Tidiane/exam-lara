<!DOCTYPE html>
<html>
<head>
    <title>MSAS</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet"> -->
</head>
<body>
     <header class="banner">
        <div class="containn">
            <div class="banner-content">
                <img src="{{ asset('img/banner.png') }}" alt="pas d'images" id="banner">
            </div>
        </div>
    </header>
  
<div class="containn">
    @yield('content')
</div>
   
</body>
</html>