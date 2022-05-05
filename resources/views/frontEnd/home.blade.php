<!DOCTYPE html>
<html id="doc-wrapper" lang="ar">

@include('frontEnd.inc.header')

      <div class="row Logo">
        <div class="col-6 logo_definition wow right-animation">
          <p class="logo_p1">Association </p>
          <p class="logo_p2">{{$info->nom}} </p>
          <p class="logo_p3">Culture et Art</p>
        </div>
      </div>
    </div>
  </header>

  <!--main-->
  <main class="container">
    <span class="up"><i class="fa-solid fa-up-long"></i></span>
    <section class="sec1">
      <div class="grid-2 sec1_row1">
        <div class="about wow right-animation">
          <h2 cl>A Propos {{$info->nom}}</h2>
          <h5>{{$info->nom}} en quelques mots</h5>
          <p class="about_p">{{$info->mot_president}} </p>
          <a class="about_link" href="#">EN SAVOIR PLUS <i class="fa-solid fa-right-long"></i></a>
        </div>
        <div class="sec1_blog">
          <div class="sec1_blog_div wow left-animation">
            <h2>À LA UNE</h2>
            <div class="grid-1">
              @foreach ($Acts as $item)
                <div class="row grid-2">
                  <div class="col">
                        <img width="100%" src="{{$item->photo->first()->URL}}" alt="">
                  </div>
                  <div class="col">
                        <h3>{{$item->name}}</h3>
                        <p>{{$item->date_debut}}  - {{$item->lieu}}</p>
                        <p>{{$item->detail}}</p>
                  </div>
              </div>
              @endforeach
            

            </div>
            <a class="blog_about_link" href="#">EN SAVOIR PLUS <i class="fa-solid fa-right-long"></i></a>
          </div>
        </div>

      </div>
    </section>

      
    <section class="sec2 main-testimonial  wow fadeup-animation">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="center-title">
              <h1 class="sec2_title">Nos Programmes</h1>
              <h4 class="sec2_Suntitle">Nos Programmes</h4>
            </div>
          </div>
        </div>
        <div class="main-testimonial-slider">
          <div class="row servece-slider">
              @foreach ($Projet as $item)
                <div class="col slide">
                    <div class="sec2_blog1 card">
                    <img src="{{asset($item->photo->first()->URL)}}" alt="photo">
                    <h3>{{$item->name}}</h3>
                    <p>{{$item->lieu}} / {{$item->date_debut}}</p>
                    </div>
                </div>
              @endforeach
                         
            </div>
                              
              </div>
          </div>
    </section>

    <section class="main-testimonial sec3">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="center-title">
              <h1 class="sec2_title">Nos Clubs</h1>
              <h4 class="sec2_Suntitle">Pour chaque spécialité</h4>
            </div>
          </div>
        </div>
        <div class="main-testimonial-slider">
          <div class="row testimonial-slider">
              @foreach ($Clubs as $item)
              <div class="col-lg-4">
                <div class="grid-2 row ">
                  <div class="div_img col wow right-animation">
                    <img class="image_club" src="{{asset($item->hero)}}" alt="photo">
                  </div>
                  <div class="sec3_blog1 col wow left-animation">
                    <div class="sec3_blog1_1">
                      <h2>Club {{$item->name}}</h2> 
                      <h5>{{$item->responsable}}</h5>
                      <p class="about_p">{{$item->details}}</p>
                      {{-- <a class="about_link" href="#" >EN SAVOIR PLUS <i class="fa-solid fa-right-long"></i></a> --}}
                    </div>
  
                  </div>
                </div>
              </div>
              @endforeach
            
            

          </div>

        </div>
      </div>

      </div>

      </div>
      </div>
      </div>
    </section>

    {{-- <section class="sec4">
      <h1 class="sec2_title">Nos Programmes</h1>
      <h4 class="sec2_Suntitle">Nos Programmes</h4>
      <div class="row sec2_div">
        <div class="col-8 div_temp wow right-animation">
         <table style="width:100%">
            <tr>
              <th>
              </th>
              <th><p>Lundi</p></th>
              <th><p>Mardi</p></th>
              <th><p>Mercredi</p></th>
              <th><p>Jeudi</p></th>
              <th><p>Vendredi</p></th>
              <th><p>Samedi</p></th>
              <th><p> Dimanche</p></th>
            </tr>
            <tr>
              <th>
                <h3>Séance de theatre</h3>
                <h5>Tikiouine / Présentielle</h5>
              </th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
            <tr>
              <th>
                <h3>Séance de math</h3>
                <h5>Tikiouine / Présentielle</h5>
              </th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
            <tr>
              <th>
                <h3>Séance d’englai</h3>
                <h5>Tikiouine / Présentielle</h5>
              </th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
            <tr>
              <th>
                <h3>Séance de lecture</h3>
                <h5>Tikiouine / Présentielle</h5>
              </th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
            <tr>
              <th>
                <h3>Séance d’infos</h3>
                <h5>Tikiouine / Présentielle</h5>
              </th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </table>
        </div>
        <div class="col sec4_blog1 wow left-animation">
          <div class="sec4_blog1_1">
            <h2>Séance de theatre</h2>
            <h5>Tikiouine</h5>
            <div class="temp">
              <p>Responsable : <span>Safaa Reffase</span></p>
              <p>Plus d’infos : <span>+212-622154879 / +212-62514782</span></p>
              <p>Durée : <span>2h (19:00 - 21:00)</span></p>
              <p>Type : <span>Présentielle </span></p>
            </div>
          </div>
        </div>
      </div>
    </section> --}}

    <section class="sec2 main-testimonial  wow fadeup-animation">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="center-title">
              <h1 class="sec2_title">Nos Partenaire </h1>
              <h4 class="sec2_Suntitle">Ce que disent les partenaires de l'unops</h4>
            </div>
          </div>
        </div>
        <div class="main-testimonial-slider">
          <div class="row servece-slider">
              @foreach ($Part as $item)
              <div class="col slide" >
                <div class="sec5_blog1">
                  <div class="grid-2 sec5_blog1_title">
                    <img src="{{$item->logo}}" alt="photo">
                    <div>
                      <div class="sec5_blog1_title1">
                      <div>
                        <h4>{{$item->name}}</h4>
                        <a href="{{$item->Url}}">Lien vere leur SiteWeb</a>
                      </div>
                      </div>
                    </div>
                    
                  </div>
                  
              </div>
            </div>
              @endforeach
            
            
                      
              
                              
              </div>
          </div>
    </section>

    <section class="sec6 wow fadeup-animation">
      <h1 class="sec2_title">Nos Actualités</h1>
      <h4 class="sec2_Suntitle">S’abonner au bulletin d’information</h4>
      <div>
        <input class="Textbox" type="text" placeholder="Entrer votre Email">
        <a class="about_link" href="#">EN SAVOIR PLUS</a>
      </div>

    </section>

    <section class="sec7 main-testimonial  wow fadeup-animation">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="center-title">
              <h1 class="sec2_title">Média et Presse</h1>
              <h4 class="sec2_Suntitle">Couverture médiatique</h4>
            </div>
          </div>
        </div>
        <div class="main-testimonial-slider">
          <div class="row servece-slider">
           @foreach ($Media as $item)
            <div class="col slide">
                <div class="sec7_blog1">
                <img src="{{asset($item->logo)}}" alt="photo">
                <div>
                    <h3 class="sec2_title">{{$item->name}}</h3>
                    <p class="sec2_Suntitle">{{$item->lieu}} / {{$item->date}}</p>
                </div>
                <a href="{{$item->url}}">Lien vere L'article</a>
                </div>
            </div>
           @endforeach
            
            
                      
              </div>
                              
              </div>
          </div>
    </section>

  </main>
 @include('frontEnd.inc.footer')
</body>