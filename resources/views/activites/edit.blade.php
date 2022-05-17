@extends('layouts.dashboard')

@section('Content')
    <div class="px-4 py-5 my-1 text-center">
        <h1 class="display-5 fw-bold">Create un noveau Activité</h1>
        <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Sur cette page, vous devez entrer toutes les informations requises pour qu'elles soient affichées à l'endroit approprié. Ceci afin de permettre un meilleur contrôle sur les informations affichées sur votre site afin qu'elles ne soient pas dépendantes</p>
        <hr>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="{{route('activite')}}" class="btn btn-primary btn-lg px-4 gap-3">Tout les Activité</a>
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
            $typeActArray = ["Formation", "Soiré", "Matiné"];
        @endphp
        <form action="{{route('activite/update', $activite->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Titre d'activité</label>
                    <input type="text" class="form-control" name="name" value="{{$activite->name}}">
                </div>
                <div class="mb-3">
                    <label for="detail" class="form-label fw-bold">Bréf description</label>
                    <textarea  class="form-control" name="detail"> {{$activite->detail}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="responsable" class="form-label fw-bold">Responsable</label>
                    <input type="text" class="form-control" name="responsable"  value="{{$activite->responsable}}">
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label fw-bold">Type</label>
                    <select name="type" id="Type" class="form-control" onchange="TypeChange()" >
                        @foreach ($typeActArray as $item)
                         <option value="{{$item}}" {{($item==$activite->type)? "selected": ""}}>{{$item}}</option>
                      @endforeach
                    </select>
                </div>
                <div class="mb-3"  id="Encadreur" style="display: none">
                    <label for="encadreur" class="form-label fw-bold">Encadreur</label>
                    <input type="text" class="form-control" name="encadreur" value="{{$activite->encadreur}}">
                </div>
                
                <div class="mb-3">
                    <label for="lieu" class="form-label fw-bold">Lieu</label>
                    <input type="text" class="form-control"name="lieu"  value="{{$activite->lieu}}">
                </div>
                <div class="mb-3">
                    <label for="date_debut" class="form-label fw-bold">Date Debut</label>
                    <input type="date" class="form-control"name="date_debut"  value="{{$activite->date_debut}}">
                </div>
                <div class="mb-3">
                    <label for="date_fin" class="form-label fw-bold">Date fin</label>
                    <input type="date" class="form-control"name="date_fin"  value="{{$activite->date_fin}}">
                </div>
                <div class="mb-3">
                    <label for="id_proj" class="form-label fw-bold">Projet</label>
                    <select name="id_proj"  class="form-control">
                      @foreach ($projets as $item)
                         <option value="{{$item->id}}" {{($item->id==$activite->id_proj)? "selected": ""}}>{{$item->name}}</option>
                      @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label fw-bold">Images</label>
                    <input type="file" min="0" class="form-control" name="photo[]" multiple="multiple" value="{{$activite->photo}}">
                </div>
                <div class="mb-3">
                    <label for="video" class="form-label fw-bold">Video</label>
                    <div class="container">
                        <div id="Vids" class="row">
                          @foreach ($activite->video as $vid)
                            <div class="col">
                                <input type="text" min="0" class="form-control my-2" name="video[]" value="{{$vid->URL}}">
                            </div>
                          @endforeach
                          <div class="col">
                            <button type="button" class="btn btn-primary my-2" onclick="Ajoute()">+</button>
                          </div>
                        </div>
                    </div>
                </div>
               
               
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
      </form>
    </div>
    <script>

        var i={{count($activite->video)-1}};
        function Ajoute(){
            if(i<4){
                var el=document.createElement("div");
                el.className = "row";
                document.getElementById('Vids').appendChild(el);
                var elt=document.createElement("div");
                elt.className = "col";
                el.appendChild(elt);
                var elt2=document.createElement("input");
                elt2.type = 'text';
                elt2.name = 'video[]';
                elt2.className = "form-control my-2";
                elt.appendChild(elt2);
            }
           i++;
        }

        function TypeChange(){
            document.getElementById('Encadreur').style.display = "none";

            if ( document.getElementById('Type').value == "Formation") {
                document.getElementById('Encadreur').style.display = "block";
                document.getElementById('Encadreur').valeu = "{{$activite->encadreur}}";
            }
        }
            window.onload = function(){
                TypeChange();
            };
       
    </script>
@endsection
