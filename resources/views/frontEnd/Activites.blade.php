<html>

@include('frontEnd.inc.minHeader')



<!--main-->
<main class="">
<span class="up"><i class="fa-solid fa-up-long"></i></span>

<section class="container sec5 wow fadeup-animation">
  <h1 class="sec2_title">Nos Activites</h1>
  <h4 class="sec2_Suntitle"></h4>
    <div class="list-wrapper grid-3 ">
        @foreach ($Activites as $item)
        <div class=" list-item ">
            <div class="sec7_blog1">
                <img style="width: 100%" src="{{$item->photo->first()->URL}}" alt="photo">
                <div class="sec7_blog1_content">
                    <div >
                        <h3 class="sec2_title">{{$item->name}}</h3>
                        <p class="sec2_Suntitle">{{$item->lieu}} | {{$item->date_debut}} -- {{$item->date_fin}}</p>
                        </div>
                        <a class="about_link link_project" href="{{route('showActivite',$item->id)}}">EN SAVOIR PLUS <i class="fa-solid fa-right-long"></i></a>
                </div>
            </div>


        </div>
      @endforeach
</div>
<div id="pagination-container"></div>
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
