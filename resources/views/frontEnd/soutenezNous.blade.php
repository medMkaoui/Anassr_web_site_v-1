<!DOCTYPE html>
<html id="doc-wrapper" lang="ar">

@include('frontEnd.inc.minHeader')

<div class="row Logo">
  <div class="col logo_definition About_title">
    <p class="logo_p2 about_us_p wow fadeup-animation">Soutenez-nous</p>
    <i class="fa-solid fa-arrow-down-from-line"></i>
  </div>
</div>
</div>
</header>

<!--main-->
<main class=""> 
<span class="up"><i class="fa-solid fa-up-long"></i></span>

<section class="sec2 ">
<h1 class="sec2_title wow fadeup-animation">Soutenez-nous</h1>
{{-- <h4 class="sec2_Suntitle wow fadeup-animation">SubTitle</h4> --}}
<div class="container">
  <div class="row wow right-animation">
    <h2>Get involved </h2>
    <p>
      {{$info->how_support_us}}
    </p>
  </div>
</div>
</section> 

<section class="container sec_Information wow fadeup-animation">
<div class="Information">
  <h1 class="sec2_title">Information</h1>
  <h4 class="sec2_Suntitle">S’abonner au bulletin d’information</h4>
        <div class="temp">
          <p> <strong>Nom de Banque  :</strong> <span> {{$info->nom_banque}}</span></p>
          <p><strong>RIB  : </strong> <span> {{$info->rib}}</span></p>
          <p><strong>Telephone de Trisorie  :</strong> <span> {{$info->tel_trisorie}}</span></p>
          <p><strong>Adresse d’association  :</strong> <span>  {{$info->adresse}}</span></p>
      </div>
</div>

</section>

@include('frontEnd.inc.emailPage')
</main>

@include('frontEnd.inc.footer')
</body>