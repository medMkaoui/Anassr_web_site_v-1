
<!DOCTYPE html>
<html>

  @include('frontEnd.inc.minHeader',['name'=>$Activite->name])

{{-- <div class="row Logo">
    <div class="col logo_definition About_title">
      <p class="logo_p2 about_us_p wow fadeup-animation">{{$Activite->name}}</p>
      <i class="fa-solid fa-arrow-down-from-line"></i>
    </div>
  </div>
</div>
</header> --}}

<!--main-->
<main class="container">
<span class="up"><i class="fa-solid fa-up-long"></i></span>
<section class="sec1">
  <div class="grid-2 sec1_row1">
    <div class="about wow right-animation">
      <h2>{{$Activite->name}}</h2>
      @if ($Activite->encadreur!=null)
        <h5>animé par {{$Activite->encadreur}} à {{$Activite->date_debut}} </h5>
      @endif
      <p class="about_p" >
        {{$Activite->detail}}
      </p>
      {{-- <a class="about_link" href="#">EN SAVOIR PLUS <i class="fa-solid fa-right-long"></i></a> --}}
    </div>
    <div class="sec1_blog wow left-animation">
        <div class="sec1_blog_div fiche">
            <h2>Fiche Tequnique</h2>
            <div class="fichies">
              <div class="grid-1">
                <h3>Nom de Projet : <strong>{{$Activite->name}}</strong></h3>
                <h3>Responsable  : <strong>{{$Activite->responsable}}</strong></h3>
                <h3>Lieu de Projet : <strong>{{$Activite->lieu}}</h3>
                <h3>Date début : <strong>{{$Activite->date_debut}}</strong></h3>
                <h3>Date Fin : <strong>{{$Activite->date_fin}}</strong></h3>
            </div>
            </div>
          </div>
    </div>

  </div>
</section>

<section class="sec2 pic wow fadeup-animation">
  <h1 class="sec2_title">Galerie de photos</h1>
  <h4 class="sec2_Suntitle"></h4>
  <div class="grid-1">
      @switch(count($Activite->photo))
          @case(5)
              <div class="module_1">
                <div class="row">
                  <div class="col-4">
                    <img src="{{asset($Activite->photo[0]->URL)}}" alt="photo">
                  </div>
                  <div class="col">
                    <div class="row">
                      <div class="col-12">
                        <div class="row">
                          <div class="col">
                            <div class="row " style="height: 100%;">
                              <div class="col-12">
                                <img src="{{asset($Activite->photo[1]->URL)}}" alt="photo">
                              </div>
                              <div class="col-12">
                                <img src="{{asset($Activite->photo[2]->URL)}}" alt="photo">
                              </div>
                            </div>

                          </div>
                          <div class="col">
                            <img src="{{asset($Activite->photo[3]->URL)}}" alt="photo">
                          </div>
                        </div>

                      </div>
                      <div class="col-12">
                        <img src="{{asset($Activite->photo[4]->URL)}}" alt="photo">
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              @break
          @case(4)
              <div class="module_2">
                <div class="row">
                  <div class="col-4">
                    <img src="{{asset($Activite->photo[0]->URL)}}" alt="photo">
                  </div>
                  <div class="col">
                    <div class="row" style="height: 100%;">
                      <div class="col-12">
                        <div class="row " style="height: 100%;">
                          <div class="col">
                            <div class="row " style="height: 100%;">
                              <div class="col-6">
                                <img src="{{asset($Activite->photo[1]->URL)}}" alt="photo">
                              </div>
                              <div class="col">
                                <img src="{{asset($Activite->photo[2]->URL)}}" alt="photo">
                              </div>
                            </div>

                          </div>
                        </div>

                      </div>
                      <div class="col-12">
                        <img src="{{asset($Activite->photo[3]->URL)}}" alt="photo">
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              @break
          @case(3)
              <div class="module_3">
                <div class="row">
                  <div class="col-6">
                    <img src="{{asset($Activite->photo[0]->URL)}}" alt="photo">
                  </div>
                  <div class="col">
                            <div class="row " style="height: 100%;">
                              <div class="col-12">
                                <img src="{{asset($Activite->photo[1]->URL)}}" alt="photo">
                              </div>
                              <div class="col-12">
                                <img src="{{asset($Activite->photo[2]->URL)}}" alt="photo">
                              </div>
                            </div>

                  </div>

                </div>
              </div>
              @break
          @case(2)
              <div class="module_4">
                <div class="row">
                  <div class="col-6">
                    <img src="{{asset($Activite->photo[0]->URL)}}" alt="photo">
                  </div>
                  <div class="col">
                    <img src="{{asset($Activite->photo[1]->URL)}}" alt="photo">
                  </div>
                </div>
              </div>
              @break
          @case(1)
              <div class="module_5" style="text-align: -webkit-center;">
                <div class="row">
                  <div class="col-12">
                    <img style="width: 72%;" src="{{asset($Activite->photo[0]->URL)}}" alt="photo">
                  </div>
                </div>
                </div>
              </div>
              @break


      @endswitch
  </div>
 </section>

<section class="container pic wow fadeup-animation">
    <h1 class="sec2_title">Video</h1>
    <h4 class="sec2_Suntitle"></h4>
    <div class="carousel row">
      @foreach ($Activite->video as $item)
        <div class="carousel-item col">
          @php
              $i=0;
              $lien =  "https://www.youtube.com/embed/"
          @endphp

          @if ($item->URL !='')
          @foreach(explode('/', $item->URL) as $item)

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

          <iframe width="560" height="315" src="{{$lien}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      @endforeach
     
    
    </div>

</section>
</main>

@include('frontEnd.inc.footer')
</body>
