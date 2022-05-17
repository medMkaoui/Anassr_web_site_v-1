
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
  
<section class="container sec6 wow fadeup-animation">
    <h1 class="sec2_title">Nos Actualités</h1>
    <h4 class="sec2_Suntitle">S’abonner au bulletin d’information</h4>
    <div>
        <form style="text-align: center;" action="{{route('mails/store')}}" method="POST">
            @csrf
            @method('POST')
            <input class="Textbox" name="mail" type="text" placeholder="Entrer votre Email">
            <button class="about_link" style="border: none" type="submit" >EN SAVOIR PLUS</button>
        </form>
    </div>
    
</section>
