<!DOCTYPE html>
<html id="doc-wrapper" lang="ar">

@include('frontEnd.inc.minHeader')
<div class="row Logo wow fadeup-animation">
  <div class="col logo_definition About_title">
    <p class="logo_p2 about_us_p wow fadeup-animation">Inscription</p>
    <i class="fa-solid fa-arrow-down-from-line"></i>
  </div>
</div>
</div>
</header>

<!--main-->
<main class="container"> 
<span class="up"><i class="fa-solid fa-up-long"></i></span>

<section class="sec2 wow fadeup-animation">
<h1 class="sec2_title">Title</h1>
<h4 class="sec2_Suntitle">SubTitle</h4>
<div class="container">
  <div class="row">
    <h2>Get involved </h2>
    <p>
      Artists and cultural institutions from the Arab region operate in an increasingly challenging environment and often with conditional support. It is the diversity of sustained funding and being less captive to agendas that allows authentic creativity to flourish. 
    </p>
  </div>
</div>
</section> 

<section class="container insc1">
<div>
  <h1>Information Personnelle</h1>
  <h4>SubTitle</h4>
  <form action="{{route('adherent/store')}}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('POST')
      <div class="grid-2">
                <input class="text_insc wow right-animation" id="gg" type="text" name="last_name" placeholder="Nom">
                <input class="text_insc wow left-animation" type="text" name="first_name" placeholder="Prenom">
                <input class="text_insc wow right-animation" type="email" name="email" placeholder="Email">
                <input class="text_insc wow left-animation" type="text" name="phone" placeholder="Telephone">  
      </div>  
      <div class="grid-1 wow fadeup-animation">
          <input class="col-12 text_insc" type="text" name="adresse" placeholder="Adresse">
      </div>
      <div class="grid-2">
                <input class="text_insc wow right-animation" id="date_naissance" type="date" onchange="onchangedate();" name="date_naissance" placeholder="Date de Naissance">
                <input class="text_insc wow left-animation" type="text" name="lieu_naissance" placeholder="Lieu de Naissance">
                <input class="text_insc wow left-animation" type="text" name="ville" placeholder="Ville">
                <input class="text_insc wow left-animation" type="text" name="nationalite" placeholder="Nationalité">
                <input class="text_insc wow left-animation" type="text" name="cin" placeholder="CIN (Si votre Age > 17)">
                <input class="text_insc wow right-animation" type="text" name="profession" placeholder="Profession">
                <input class="text_insc wow left-animation" type="text" name="niveau_scolaire" placeholder="Niveau Scolaire">
      </div> 
              
      <div class="row wow fadeup-animation">
          <div class="col-6">
              <div class="row">
                  <p class="col-7 p_img_insc">Image</p>
                  <input type="file" name="image" class="text_insc wow left-animation" >
              </div>
          </div>
        </div>

      </div>
    </div>

    </section>

    <div id="Col">
      
    </div>
    <input type="radio" id="radio_insc" name="read_statu" >
    <label for="radio_insc">Avez-vous lu <a href="#">les statuts d association ?</a></label>
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