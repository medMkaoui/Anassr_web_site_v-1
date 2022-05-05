<!DOCTYPE html>
<!-- upto 2 directory depth-->
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Super Folio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
  <body >
    <div class="container">
      <div class="row">
        <div class="col">
          <p>{{$date_mp}}</p>
            <img src="{{asset($photo)}}" class="" alt="">
            {{-- <h1>Hello i'm {{$data->f_name}} {{$data->l_name}}</h1>
            <p> {{$data->description}}</p>
            <p> {{$data->statu}}</p>
            <p> {{$data->mail}}</p> --}}
        </div>
      </div>
      <div class="row">
        <div class="col">
          1 of 3
        </div>
        
       
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>