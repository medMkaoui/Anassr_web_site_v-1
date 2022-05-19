<!DOCTYPE html>
<html id="doc-wrapper" lang="ar">

@include('frontEnd.inc.header')

      <div class="row Logo">
        <div class="col-6 logo_definition wow right-animation">
          <p class="logo_p1">Association </p>
          <p class="logo_p2">Anassr </p>
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
            <h2 cl>A Propos Anassr</h2>
            <h5>Anassr en quelques mots</h5>
            <p class="about_p">{{$info->mot_president}} </p>
            <a class="about_link" href="{{route('about')}}">EN SAVOIR PLUS <i class="fa-solid fa-right-long"></i></a>
          </div>
          <div class="sec1_blog">
            <div class="sec1_blog_div wow left-animation">
              <h2>À LA UNE</h2>
              <div class="grid-1 a_le_une">
                @foreach ($Acts as $item)
                  <div class="row a_le_une_div" class="row grid-2">
                    <div class="col">
                          <img width="100%" src="{{$item->photo->first()->URL}}" alt="">
                    </div>
                    <div style="align-self: center;" class="col">
                          <h3>{{$item->name}}</h3>
                          <p>{{$item->date_debut}}  - {{$item->lieu}}</p>
                          <p>{{$item->detail}}</p>
                    </div>
                </div>
                @endforeach


              </div>
              <a class="blog_about_link" href="{{route('activites')}}">EN SAVOIR PLUS <i class="fa-solid fa-right-long"></i></a>
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
                      <h2>{{$item->name}}</h2>
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


    </section>


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
                      <div class="grid-1 sec5_blog1_title">
                          <img src="{{$item->logo}}" alt="photo">
                          <div>
                            <h4>{{$item->name}}</h4>
                            <a href="{{$item->Url}}">Lien vere leur SiteWeb</a>
                          </div>
                      </div>
                    </div>
                  </div>
                @endforeach
            </div>
          </div>
      </section>
    @include('frontEnd.inc.emailPage')

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
                <div class="sec7_blog1 meddia">
                <img src="{{asset($item->logo)}}" alt="photo">
                <div class="meddia_div">
                    <h3 class="sec2_title">{{$item->name}}</h3>
                    <p class="sec2_Suntitle">{{$item->lieu}} / {{$item->date}}</p>
                    <a href="{{$item->url}}">Lien vere L'article</a>

                </div>
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
