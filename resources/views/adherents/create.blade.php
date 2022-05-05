@extends('layouts.dashboard')

@section('Content')
    <div class="px-4 py-5 my-1 text-center">
        <h1 class="display-5 fw-bold">Noveau Adherent</h1>
        <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Sur cette page, vous devez entrer toutes les informations requises pour qu'elles soient affichées à l'endroit approprié. Ceci afin de permettre un meilleur contrôle sur les informations affichées sur votre site afin qu'elles ne soient pas dépendantes</p>
        <hr>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="{{route('adherents')}}" class="btn btn-primary btn-lg px-4 gap-3">Tout les adherents</a>
        </div>
        </div>
    </div>
    {{-- Form_for create a new member --}}
    <div class="container">
        <form action="{{route('adherent/store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                @if (count($errors)>0)
                    @foreach ($errors as $item)
                        <div class="alert alert-danger" role="alert">
                            {{$item}}
                        </div>
                    @endforeach
                @endif
                <div>
                   
                        <div class="row">
                          <div class="col" id="firstColumn">
                            <div class="mb-3">
                                <label for="last_name" class="form-label fw-bold">Nom</label>
                                <input type="text" class="form-control" name="last_name" >
                            </div>
                            <div class="mb-3">
                                <label for="first_name" class="form-label fw-bold">Prénom</label>
                                <input type="text" class="form-control" name="first_name" >
                            </div>
                            <div class="mb-3">
                                <label for="cin" class="form-label fw-bold">CIN</label>
                                <input type="text" class="form-control" name="cin"  >
                            </div>
                            <div class="mb-3">
                                <label for="profession" class="form-label fw-bold">Profession</label>
                                <input type="text" class="form-control"name="profession" >
            
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">Email</label>
                                <input type="email" class="form-control"name="email" >
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label fw-bold">Téléphone</label>
                                <input type="text" class="form-control"name="phone"  >
                            </div>
                            <div class="mb-3">
                                <label for="lieu_naissance" class="form-label fw-bold">Lieu de naissance</label>
                                <input type="text" class="form-control"name="lieu_naissance">
                            </div>
                          </div>
                          <div class="col">
                            <div class="mb-3">
                                <label for="date_naissance" class="form-label fw-bold">Date de naissance</label>
                                <input type="date" class="form-control"name="date_naissance" id="date_naissance" onchange="onchangedate();">
                            </div>
                            <div class="mb-3">
                                <label for="ville" class="form-label fw-bold">Ville</label>
                                <input type="text" class="form-control"name="ville" id="vill" >
                            </div>
                            <div class="mb-3">
                                <label for="adresse" class="form-label fw-bold">Adresse</label>
                                <input type="text" min="0" class="form-control"name="adresse" >
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label fw-bold">Image</label>
                                <input type="file" min="0" class="form-control" name="image">
                            </div>
            
                            
                            <div class="mb-3">
                                <label for="nationalite" class="form-label fw-bold">nationalité</label>
                                <input type="text" min="0" class="form-control"name="nationalite" >
                            </div>
                            <div class="mb-3">
                                <label for="niveau_scolaire" class="form-label fw-bold">Niveau_scolaire</label>
                                <input type="text" min="0" class="form-control"name="niveau_scolaire"  >
                            </div>

                           
                          </div>
                          
                        </div>
                      </div>
                   
                      <div class="mb-3">
                        <input type="checkbox"  class="form-check-control"  name="read_statu"  >
                        <label for="read_statu" class="form-label fw-bold">Avez-vous lu le règlement intérieur de l'association ?</label>
                -    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                
      </form>
    </div>
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
                  $( "#firstColumn").append( ' <div id="titure">    <div class="mb-3"> <label for="nom_titure" class="form-label fw-bold">nom_titure</label> <input type="text" min="0" class="form-control"name="nom_titure"  >  </div>  <div class="mb-3">      <label for="prenom_titure" class="form-label fw-bold">prenom_titure</label>      <input type="text" min="0" class="form-control"name="prenom_titure" >  </div>  <div class="mb-3">      <label for="email_titure" class="form-label fw-bold">email_titure</label>      <input type="text" min="0" class="form-control"name="email_titure"  >  </div>   <div class="mb-3">      <label for="cin_titure" class="form-label fw-bold">Cin de titure</label>      <input type="text" min="0" class="form-control"name="cin_titure"  >  </div>  <div class="mb-3">      <label for="tel_titure" class="form-label fw-bold">Téléphone de titure</label>  <input type="text" min="0" class="form-control"name="tel_titure"  >   </div>  </div> ');
                }

            }
        }

    </script>
   
@endsection
