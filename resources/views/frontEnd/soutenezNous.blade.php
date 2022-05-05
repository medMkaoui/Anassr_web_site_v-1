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
  <div class="grid-2">
            <input class="text_insc wow right-animation" type="text" placeholder="Nom">
            <input class="text_insc wow left-animation" type="text" placeholder="Prenom">
            <input class="text_insc wow right-animation" type="text" placeholder="Email">
            <input class="text_insc wow left-animation" type="text" placeholder="Telephone">  
  </div>  
  <div class="grid-1 wow fadeup-animation">
      <input class="col-12 text_insc" type="text" placeholder="Adresse">
  </div>
  <div class="grid-2">
            <input class="text_insc wow right-animation" type="date" placeholder="Date de Naissance">
            <input class="text_insc wow left-animation" type="text" placeholder="Lieu de Naissance">
            <div class="wow right-animation">
              <select class="select_insc text_insc" name="cars" id="cars">
                <option value="volvo" hidden>Ville</option>
                <option value="saab">Saab</option>
                <option value="mercedes">Mercedes</option>
                <option value="audi">Audi</option>
              </select>
            </div>
            <div class="wow left-animation">
              <select class="select_insc text_insc " name="cars" id="cars">
                <option value="volvo" hidden>Natinalité</option>
                <option value="saab">Saab</option>
                <option value="mercedes">Mercedes</option>
                <option value="audi">Audi</option>
              </select>
            </div>
            <input class="text_insc wow right-animation" type="text" placeholder="Lieu de Naissance">
            <input class="text_insc wow left-animation" type="text" placeholder="CIN (Si votre Age > 17)">
            <input class="text_insc wow right-animation" type="text" placeholder="Profession">
            <input class="text_insc wow left-animation" type="text" placeholder="Niveau Scolaire (Si votre Age < 17)">
  </div> 
          
  <div class="row wow fadeup-animation">
      <div class="col-6">
          <div class="row">
              <p class="col-7 p_img_insc">Image</p>
              <a class="col link_insc  " href="Titre_Activite.html">Choisez votre image</a>
          </div>
      </div>
    </div>

  </div>
</div>

</section>

<section class="container insc1">
<div >
  <h1 class="wow fadeup-animation">Information de Titure</h1>
  <h4 class="wow fadeup-animation">Si votre age moin de 17 ans</h4>
  <div class="grid-2">
            <input class="text_insc wow right-animation" type="text" placeholder="Nom de Titure">
            <input class="text_insc wow left-animation" type="text" placeholder="Prenom de Titure">
            <input class="text_insc wow right-animation" type="text" placeholder="Email">
            <input class="text_insc wow left-animation" type="text" placeholder="Telephone"> 
            <input class="text_insc wow right-animation" type="text" placeholder="CIN de Titure"> 
  </div>  
          
  <div class="row">
      <div class="col-6">
          <div class="grid_2 wow right-animation">
            <input type="radio" id="radio_insc" name="fav_language" value="radio_insc">
            <label for="radio_insc">Avez-vous lu <a href="#">les statuts de l'association ?</a></label>
          </div>
      </div>
    </div>

  </div>
</div>
<div class="row btn_insc wow fadeup-animation">
  <a class="about_link" href="#">S’inscrir</a>
</div>
</div>
</section>

<section class="container sec6 wow fadeup-animation">
<h1 class="sec2_title">Nos Actualités</h1>
<h4 class="sec2_Suntitle">S’abonner au bulletin d’information</h4>
<div>
  <input class="Textbox" type="text" placeholder="Entrer votre Email">
  <a class="about_link" href="#">EN SAVOIR PLUS</a>
</div>

</section>
</main>

@include('frontEnd.inc.footer')
</body>