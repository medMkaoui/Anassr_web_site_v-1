<html>

@include('frontEnd.inc.minHeader')

<div class="row Logo wow fadeup-animation">
    <div class="col logo_definition About_title">
      <p class="logo_p2 about_us_p">Nos Projets</p>
    </div>
  </div>
</div>
</header>

<!--main-->
<main class="">
<span class="up"><i class="fa-solid fa-up-long"></i></span>

<section class="container sec5 wow fadeup-animation">
  <h1 class="sec2_title">Nos Projets</h1>
  <h4 class="sec2_Suntitle"></h4>
  <div class="grid-3 sec2_div page-content">
    <div class="page active">
      @foreach ($projets as $item)
        <div class="sec7_blog1">
            <img style="width: 100%" src="{{$item->photo->first()->URL}}" alt="photo">
            <div>
            <h3 class="sec2_title">{{$item->name}}</h3>
            <p class="sec2_Suntitle">{{$item->lieu}} | {{$item->date_debut}} -- {{$item->date_fin}}</p>
            </div>
            <a class="about_link link_project" href="{{route('showProjet',$item->id)}}">EN SAVOIR PLUS <i class="fa-solid fa-right-long"></i></a>
        </div>
      @endforeach
     
    </div>
          
    
  </div>
  <div class="pagination-container">
    <div class="page-numbers-container">
        {!! $projets->links() !!}
    </div>
  </div>
</section> 

<section class="container wow fadeup-animation">
  <div class="rejoin">
    <h1 class="sec2_title">Rejoignez-nous</h1>
    <h4 class="sec2_Suntitle">Être l'un d'entre nous</h4>
    <a class="about_link link_project link_rejoin" href="{{route("getInsc")}}">Rejoignez-nous</a>
  </div>
  
</section>
</main>
@include('frontEnd.inc.footer')
</html>