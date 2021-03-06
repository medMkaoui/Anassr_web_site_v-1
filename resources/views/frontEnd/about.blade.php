<!DOCTYPE html>
<html id="doc-wrapper" lang="ar">

@include('frontEnd.inc.minHeader')



  <!--main-->
  <main class="">
    <span class="up"><i class="fa-solid fa-up-long"></i></span>
    <section class="container sec1_about wow fadeup-animation">
      <nav class="About_Menu">
        <a href="#About_us" >Apropos Anassr</a>
        <a href="#équipe" >Notre Equipe</a>
        {{-- <a href="#statistique" >Nos Statistique</a> --}}
      </nav>
    </section>

    <section class="sec2_about " id="About_us">
      <h1 class="sec2_title wow fadeup-animation">A propos Anassr</h1>
      <h4 class="sec2_Suntitle wow fadeup-animation">Anassr en détail</h4>
      <div class="container wow right-animation" data-wow-delay="0.4s">
        <div class="row " >
          <h2>Welcome </h2>
          <p>
              {{$info->mot_president}}
          </p>
        </div>
        <div class="row">
          <h2>Our Vision </h2>
          <p>
            {{$info->vision}}
          </p>

        </div>
        <div class="row">
          <h2>How we work </h2>
          <div>
            <p>
                {{$info->how_we_work}}
            </p>

          </div>

        </div>

      </div>

    </section>

    @if ($info->video_support !="")
      <section class="container pic wow fadeup-animation">
          <h1 class="sec2_title">Video</h1>
          <h4 class="sec2_Suntitle">Sub Title</h4>

        <div class="video">
          <div class="">
            @php
                $i=0;
                $lien =  "https://www.youtube.com/embed/"
            @endphp

             @if ($info->video_apropos !='')
            @foreach(explode('/', $info->video_apropos) as $item)

                @if ($i==3)
                    @php
                        $lien =$lien . $item
                    @endphp

                @endif


                @php
                    $i++
                @endphp


            @endforeach
            @endif

            <iframe width="560" height="315" src=" {{$lien}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
      </section>
  @endif

  <section class="container sec5" id="équipe">
    <h1 class="sec2_title">Notre équipe</h1>
    <h4 class="sec2_Suntitle">Soldats invisibles</h4>
    <div class="grid-3 sec2_div wow fadeup-animation">
      @foreach ($team as $item)
      <div class="sec5_blog1 sec_equipe">
          <div class="row equipe">
              <div class="col-12 col-lg-4">
                  <img  src="{{asset($item->photo)}}" alt="photo">

              </div>
            <div class="col-12 col-lg gird-1">
                <h3>{{$item->first_name}} {{$item->last_name}}</h3>
                <p>{{$item->statu}}</p>
            </div>
          </div>
        </div>
      @endforeach

    </div>
  </section>

    {{-- <section class="container sec7 wow fadeup-animation" id="statistique">
      <h1 class="sec2_title">Nos statistiques</h1>
      <h4 class="sec2_Suntitle">Anassr en nombre</h4>
      <div class="sec2_div">
        <img class="static" src="assets/images/SECTION/Rectangle 33.png" alt="photo">

      </div>
    </section> --}}

    <section class="container wow fadeup-animation" >
      <div class="rejoin">
        <h1 class="sec2_title">Rejoignez-nous</h1>
        <h4 class="sec2_Suntitle">Être l'un d'entre nous</h4>
        <a class="about_link link_rejoin" href="{{route('getInsc')}}">Rejoignez-nous</a>
      </div>

    </section>
  </main>

@include('frontEnd.inc.footer')
</body>
