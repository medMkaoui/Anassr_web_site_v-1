<!DOCTYPE html>
<html id="doc-wrapper" lang="ar">

@include('frontEnd.inc.minHeader')

{{-- <div class="row Logo">
  <div class="col logo_definition About_title">
    <p class="logo_p2 about_us_p wow fadeup-animation">Soutenez-nous</p>
    <i class="fa-solid fa-arrow-down-from-line"></i>
  </div>
</div>
</div>
</header> --}}

<!--main-->
<main class="">
<span class="up"><i class="fa-solid fa-up-long"></i></span>

<section class="sec2 ">
<h1 class="sec2_title wow fadeup-animation">Soutenez-nous</h1>
{{-- <h4 class="sec2_Suntitle wow fadeup-animation">SubTitle</h4> --}}
<div class="container">
  <div class="wow right-animation">
    <h2>Get involved </h2>
    <p>
      {{$info->how_support_us}}
    </p>
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

      @if ($info->video_support !='')
      @foreach(explode('/', $info->video_support) as $item)

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



<section class="container sec_Information wow fadeup-animation">
  <div class="Information">
    <h1 class="sec2_title">Soutenir Anassr</h1>
    <h4 class="sec2_Suntitle">Nous contacter</h4>
        <div class="temp">
            <p> <strong>Facebook</strong> <span> {{$info->fb}}</span></p>
            <p><strong>Instagram </strong> <span> {{$info->instagram}}</span></p>
            <p><strong>Téléphone </strong> <span> {{$info->whatsapp}} </span></p>
            <p><strong>Adresse d’association </strong> <span> {{$info->adresse}}</span></p>
        </div>
  </div>
</section>

@include('frontEnd.inc.emailPage')
</main>

@include('frontEnd.inc.footer')
</body>
