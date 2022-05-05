
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="manifest" href="manifest.json" />
    <meta name="apple-mobile-web-app-status-bar" content="#db4938" />
    <meta name="theme-color" content="#db4938" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="{{asset("assets/css/bootstrap-grid.css")}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="{{asset("assets/css/animate.css")}}" />
    <link rel="stylesheet" href="{{asset("assets/css/slick-theme.css")}}" />
    <link rel="stylesheet" href="{{asset("assets/css/slick.css")}}" />
    <link rel="stylesheet" href="{{asset("assets/css/style.css")}}" />
    <title>ASSOCIATION ......</title>
  </head>
  <body>
    <!--header-->
    <header class="headr">
      <img class="header-image" src="{{asset('assets/images/HEDEAR/header_image.png')}}" alt="">
      <div class="nav_Mob" >
        <i class="fa-solid fa-bars" id="icon_bar"></i>
      </div>
        <nav class="header_nav_Mob" id="nav_mob">
          <div class="close">
            <i class="fa-solid fa-xmark" id="icon_close"></i>
          </div>
              <a href="{{route('Accuiel')}}" class="underline-hover">Ana</a>
              <a href="About.html" class="underline-hover">Qui somme Nous?</a>
              <a href="{{route('projet')}}" class="underline-hover">Projets</a>
              <a href="{{route('activites')}}" class="underline-hover">Activites</a>
              {{-- <a href="Store.html" class="underline-hover">Store</a> --}}
              <a href="{{route('soutenezNous')}}" class="underline-hover">Soutenez-nous</a>
              <a href="{{route('getInsc')}}" class="underline-hover">Inscription</a>
        </nav>
      
      
      <div class="container header-div1">
        <div class="row nav ">
          <div class="col-12 wow fadeup-animation">
            <nav class="header_nav">
              <a href="{{route('Accuiel')}}" class="underline-hover">Accueil</a>
              <a href="{{route('about')}}" class="underline-hover">Qui somme Nous?</a>
              <a href="{{route('projet')}}" class="underline-hover">Projets</a>
              <a href="{{route('activites')}}" class="underline-hover">Activites</a>
              {{-- <a href="Store.html" class="underline-hover">Store</a> --}}
              <a href="{{route('soutenezNous')}}" class="underline-hover">Soutenez-nous</a>
              <a href="{{route('getInsc')}}" class="underline-hover">Inscription</a>
            </nav>
  
          </div>
        </div>