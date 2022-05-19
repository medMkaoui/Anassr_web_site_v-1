@extends('layouts.dashboard')

@section('Content')
    <div class="px-4 py-5 my-1 text-center">
        <h1 class="display-5 fw-bold">Modifier Votre informations</h1>
        <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Sur cette page, vous devez entrer toutes les informations requises pour qu'elles soient affichées à l'endroit approprié. Ceci afin de permettre un meilleur contrôle sur les informations affichées sur votre site afin qu'elles ne soient pas dépendantes</p>
        <hr>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="{{route('adherents')}}" class="btn btn-primary btn-lg px-4 gap-3">Tout Adherents</a>
        </div>
        </div>
    </div>
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
    {{-- Form_for create a new member --}}
    <div class="container">

        @php
            $niveauscolaireArray = ["< Bac", "Bac", "Bac + 1", "Bac+2"];
        @endphp
        <form action="{{route('adherent/update', $adherents->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
            <div>
                <div class="mb-3">
                    <label for="last_name" class="form-label fw-bold">Nom</label>
                    <input type="text" class="form-control" name="last_name" value="{{$adherents->last_name}}">
                </div>
                <div class="mb-3">
                    <label for="first_name" class="form-label fw-bold">Prénom</label>
                    <textarea  class="form-control" name="first_name"> {{$adherents->first_name}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="cin" class="form-label fw-bold">CIN</label>
                    <input type="text" class="form-control" name="cin"  value="{{$adherents->cin}}">
                </div>
                <div class="mb-3">
                    <label for="profession" class="form-label fw-bold">Profession</label>
                    <input type="text" class="form-control"name="profession"  value="{{$adherents->profession}}">

                </div>
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="email" class="form-control"name="email"  value="{{$adherents->email}}">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label fw-bold">Téléphone</label>
                    <input type="text" class="form-control"name="phone"  value="{{$adherents->phone}}">
                </div>
                <div class="mb-3">
                    <label for="lieu_naissance" class="form-label fw-bold">Lieu de naissance</label>
                    <input type="text" class="form-control"name="lieu_naissance"  value="{{$adherents->lieu_naissance}}">
                </div>
                <div class="mb-3">
                    <label for="date_naissance" class="form-label fw-bold">Date de naissance</label>
                    <input type="date" class="form-control"name="date_naissance"  value="{{$adherents->date_naissance}}">
                </div>
                <div class="mb-3">
                    <label for="ville" class="form-label fw-bold">Ville</label>
                    <input type="text" class="form-control"name="ville"  value="{{$adherents->ville}}">
                </div>
                <div class="mb-3">
                    <label for="adresse" class="form-label fw-bold">Adresse</label>
                    <input type="text" min="0" class="form-control"name="adresse"  value="{{$adherents->adresse}}">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label fw-bold">Image</label>
                    <input type="file" min="0" class="form-control" name="image" value="{{$adherents->image}}">
                </div>

                
                <div class="mb-3">
                    <label for="nationalite" class="form-label fw-bold">nationalité</label>
                    <input type="text" min="0" class="form-control"name="nationalite"  value="{{$adherents->nationalite}}">
                </div>
                <div class="mb-3">
                    <label for="niveau_scolaire" class="form-label fw-bold">Niveau_scolaire</label>
                    <select name="niveau_scolaire" class="form-control">
                        @foreach ($niveauscolaireArray as $item)
                            <option value="{{$item}}" {{($item==$adherents->niveau_scolaire)? "selected": ""}}>{{$item}}</option>
                        @endforeach
                    </select>                      
                </div>
                <div class="mb-3">
                    <label for="nom_titure" class="form-label fw-bold">nom_titure</label>
                    <input type="text" min="0" class="form-control"name="nom_titure"  value="{{$adherents->nom_titure}}">
                </div>
                <div class="mb-3">
                    <label for="prenom_titure" class="form-label fw-bold">prenom_titure</label>
                    <input type="text" min="0" class="form-control"name="prenom_titure"  value="{{$adherents->prenom_titure}}">
                </div>
                <div class="mb-3">
                    <label for="email_titure" class="form-label fw-bold">email_titure</label>
                    <input type="text" min="0" class="form-control"name="email_titure"  value="{{$adherents->email_titure}}">
                </div>
                <div class="mb-3">
                    <label for="tel_titure" class="form-label fw-bold">tel_titure</label>
                    <input type="text" min="0" class="form-control"name="tel_titure"  value="{{$adherents->tel_titure}}">
                </div>
                <div class="mb-3">
                    <label for="cin_titure" class="form-label fw-bold">cin_titure</label>
                    <input type="text" min="0" class="form-control"name="cin_titure"  value="{{$adherents->cin_titure}}">
                </div>
                <div class="mb-3">
                     <input type="checkbox"  class="form-check-control"  name="read_statu" {{($adherents->read_statu==1)?"checked":""}} >
                    <label for="read_statu" class="form-label fw-bold">Avez-vous lu le règlement intérieur de l'association ?</label>
                </div>

                <button type="submit" class="btn btn-primary mb-3">Submit</button>
            </div>
      </form>
    </div>
   

@endsection
