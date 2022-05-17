<!DOCTYPE html>
<html id="doc-wrapper" lang="ar">

@include('frontEnd.inc.minHeader')

@php
$niveauscolaireArray = ["< Bac", "Bac", "Bac + 1", "Bac+2"];
@endphp

<!--main-->
<main class="container"> 
<span class="up"><i class="fa-solid fa-up-long"></i></span>

<section class="sec2 wow fadeup-animation">
<h1 class="sec2_title">Engagez-vous avec nous</h1>
<h4 class="sec2_Suntitle">Ensemble faisons la différence</h4>
<div class="container">
  <br>
  <div class="">
    <h2>Pourquoi vous impliquez-vous ?</h2>
    <p>
      {{$info->txtAdheration}}
    </p>
  </div>
</div>
</section> 

<section class="container insc1">
  <div>
    <h1>Information Personnelle</h1>
    <h4>Pour garder le contact avec vous</h4>

    @if($errors->any())
          <div class="alert alert-danger">
              <p><strong>Opps Something went wrong</strong></p>
              <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
              </ul>
          </div>
      @endif
    <form action="{{route('adherent/store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
        <div class="grid-2">
                  <input class="text_insc wow right-animation" id="gg" type="text" name="last_name" placeholder="Nom">
                  <input class="text_insc wow left-animation" type="text" name="first_name" placeholder="Prenom">
                  <input class="text_insc wow right-animation" type="email" name="email" placeholder="Email">
                  <input class="text_insc wow left-animation" type="text" name="phone" placeholder="Telephone">  
        </div>  
        <div class="grid-1 wow fadeup-animation big_insc">
            <input class="col-12 text_insc" type="text" name="adresse" placeholder="Adresse">
        </div>
        <div class="grid-2">
                  <input class="text_insc wow right-animation" id="date_naissance" type="date" onchange="onchangedate();" name="date_naissance" placeholder="Date de Naissance">
                  <input class="text_insc wow left-animation" type="text" name="lieu_naissance" placeholder="Lieu de Naissance">
                  <input class="text_insc wow left-animation" type="text" name="ville" placeholder="Ville">
                  <input class="text_insc wow left-animation" type="text" name="nationalite" placeholder="Nationalité">
                  <input class="text_insc wow left-animation" type="text" name="cin" placeholder="CIN (Si votre Age > 17)">
                  <input class="text_insc wow right-animation" type="text" name="profession" placeholder="Profession">
                  <select name="niveau_scolaire" class="form-control">
                    @foreach ($niveauscolaireArray as $item)
                        <option value="{{$item}}">{{$item}}</option>
                    @endforeach
                </select>   
        </div> 
                
        <div class="row wow fadeup-animation">
            <div class="col-6">
                <div class="row">
                    <p class="col-7 p_img_insc">Image</p>
                    <input type="file" name="image" class="text_insc wow left-animation isc_img" >
                </div>
            </div>
          </div>

        </div>
      </div>

      </section>

      <div id="Col">
        
      </div>
      <input type="radio" id="radio_insc" name="read_statu" >
      <label for="radio_insc">Avez-vous lu <a href="{{route('statu')}}">les statuts d association ?</a></label>
        <div class="row btn_insc wow fadeup-animation">
          <button class="about_link" style="border: none" type="submit">S’inscrir</button>
        </div>
    </form>
    {{-- <section class="container sec6 wow fadeup-animation">
    <h1 class="sec2_title">Nos Actualités</h1>
    <h4 class="sec2_Suntitle">S’abonner au bulletin d’information</h4>
    <div>
      <input class="Textbox" type="text" placeholder="Entrer votre Email">
      <a class="about_link" href="#">EN SAVOIR PLUS</a>
    </div>

    </section> --}}
  </main>

  <script>
    function onchangedate(){
      var result =$('#date_naissance').val();
        var age;
          if(result != ''){
              result = new Date(result);
              var today = new Date();
              age = Math.floor((today-result)/(365.25 * 24 * 60 * 60 * 1000));
              $("#titure").remove();
              if((age < 18))
              {
                $( "#Col").append( '<section class="container insc1" id="titure"> <div > <h1 class="wow fadeup-animation">Information de Titure</h1> <h4 class="wow fadeup-animation">Si votre age moin de 17 ans</h4> <div class="grid-2"> <input class="text_insc wow right-animation" name="nom_titure" type="text" placeholder="Nom de Titure"><input class="text_insc wow left-animation" name="prenom_titure" type="text" placeholder="Prenom de Titure"><input class="text_insc wow right-animation" type="email" name="email_titure" placeholder="Email"><input class="text_insc wow left-animation" name="tel_titure" type="text" placeholder="Telephone"> <input class="text_insc wow right-animation" type="text" name="cin_titure" placeholder="CIN de Titure"> </div> <div class="row"><div class="col-6"><div class="grid_2 wow right-animation"> </div></div></section> ');
              }

          }
      }

  </script>
  @include('frontEnd.inc.footer')
</body>