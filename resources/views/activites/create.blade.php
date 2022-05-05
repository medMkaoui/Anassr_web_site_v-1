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
    {{-- Form_for create a new member --}}
    <div class="container">
        <form action="{{route('activite/store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Titre d'activité</label>
                    <input type="text" class="form-control"name="name">
                </div>
                <div class="mb-3">
                    <label for="detail" class="form-label fw-bold">Bréf description</label>
                    <textarea  class="form-control" name="detail"></textarea>
                </div>
                <div class="mb-3">
                    <label for="responsable" class="form-label fw-bold">Responsable</label>
                    <input type="text" class="form-control" name="responsable" >
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label fw-bold">Type</label>
                    <select name="type"  class="form-control">
                        <option value="Formation">Formation</option>
                        <option value="Soiré">Soiré</option>
                        <option value="Matiné">Matiné</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="encadreur" class="form-label fw-bold">Encadreur</label>
                    <input type="text" class="form-control"name="encadreur" >
                </div>
                <div class="mb-3">
                    <label for="lieu" class="form-label fw-bold">Lieu</label>
                    <input type="text" class="form-control"name="lieu" >
                </div>
                <div class="mb-3">
                    <label for="date_debut" class="form-label fw-bold">Date Debut</label>
                    <input type="date" class="form-control"name="date_debut" >
                </div>
                <div class="mb-3">
                    <label for="date_fin" class="form-label fw-bold">Date fin</label>
                    <input type="date" class="form-control"name="date_fin" >
                </div>
                <div class="mb-3">
                    <label for="dure" class="form-label fw-bold">Dure</label>
                    <input type="number" min="0" class="form-control"name="dure" >
                </div>
                <div class="mb-3">
                    <label for="id_proj" class="form-label fw-bold">Projet</label>
                    <select name="id_proj"  class="form-control">
                      @foreach ($projets as $item)
                         <option value="{{$item->id}}">{{$item->name}}</option>
                      @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label fw-bold">Images</label>
                    <input type="file" min="0" class="form-control" name="photo[]" multiple="multiple">
                </div>
                <div class="mb-3">
                    <label for="video" class="form-label fw-bold">Video</label>
                    <div class="container">
                        <div id="Vids" class="row">
                          <div class="col">
                            <input type="text" min="0" class="form-control my-2" name="video[]" >
                          </div>
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
        function Ajoute(){

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
    </script>
@endsection
