
<!DOCTYPE html>
<html>

  @include('frontEnd.inc.minHeader')

<div class="row Logo">
    <div class="col logo_definition About_title">
      <p class="logo_p2 about_us_p wow fadeup-animation">{{$Projets->name}}</p>
      <i class="fa-solid fa-arrow-down-from-line"></i>
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
      <h2>{{$Projets->name}}</h2>
      <h5>animé par {{$Projets->name}} à {{$Projets->date_debut}} </h5>
      <p class="about_p" >
        {{$Projets->detail}}
      </p>
      {{-- <a class="about_link" href="#">EN SAVOIR PLUS <i class="fa-solid fa-right-long"></i></a> --}}
    </div>
    <div class="sec1_blog wow left-animation">
      <div class="sec1_blog_div">
        <h2>Fiche Technique</h2>
        <div>

        </div>
        {{-- <a class="blog_about_link" href="#">EN SAVOIR PLUS <i class="fa-solid fa-right-long"></i></a> --}}
      </div>
    </div>

  </div>
</section> 

{{-- <section class="sec2 pic wow fadeup-animation">
  <h1 class="sec2_title">Galerie de photos</h1>
  {{-- <h4 class="sec2_Suntitle">SubTitle</h4> --}}
  <div class="row">
      <div class="col-4">
        <img src="assets/images/SECTION/Rectangle 41.png" alt="photo">
      </div>
      <div class="col">
        <div class="row">
          <div class="col-12">
            <div class="row">
              <div class="col">
                <div class="row " style="height: 100%;">
                  <div class="col-12">
                    <img src="assets/images/SECTION/Rectangle 42.png" alt="photo" >
                  </div>
                  <div class="col-12">
                    <img src="assets/images/SECTION/Rectangle 44.png" alt="photo">
                  </div>
                </div>
                      
              </div>
              <div class="col">
                <img src="assets/images/SECTION/Rectangle 43.png" alt="photo">
              </div>
            </div>
            
          </div>
          <div class="col-12">
            <img src="assets/images/SECTION/Rectangle 45.png" alt="photo">
          </div>
        </div>
            
      </div>
  </div>
{{-- </section> --}}

<section class="container pic wow fadeup-animation">
  <h1 class="sec2_title">Video</h1>
  <h4 class="sec2_Suntitle">Sub Title</h4>
  <div>
    <iframe width="560" height="315" src={{ $Projets->video->first()->URL . "&output=embed" }} frameborder="0" allowfullscreen>
    </iframe>
  </div>
  
</section>
</main>

@include('frontEnd.inc.footer')
</body>
</html>