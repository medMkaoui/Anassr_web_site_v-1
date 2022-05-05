@extends('layouts.dashboard')

@section('Content')
    <div class="px-4 py-5 my-1 text-center">
        <h1 class="display-5 fw-bold">Modifier les infos d'media</h1>
        <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Sur cette page, vous devez entrer toutes les informations requises pour qu'elles soient affichées à l'endroit approprié. Ceci afin de permettre un meilleur contrôle sur les informations affichées sur votre site afin qu'elles ne soient pas dépendantes</p>
        <hr>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="{{route('medias')}}" class="btn btn-primary btn-lg px-4 gap-3">Tout les Medias</a>
        </div>
        </div>
    </div>
    {{-- Form_for create a new member --}}
    <div class="container">

        <form action="{{route('media/update', $media->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Logo</label>
                    <input type="file" class="form-control" name="logo" value="{{$media->logo}}" >
                </div>
                <div class="mb-3">
                    <label for="detail" class="form-label fw-bold">Nom </label>
                    <input type="text" class="form-control" name="name"  value="{{$media->name}}">
                </div>
                <div class="mb-3">
                    <label for="lieu" class="form-label fw-bold">Lieu </label>
                    <input type="text" class="form-control" name="lieu" value="{{$media->lieu}}" >
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label fw-bold">Date de Presse </label>
                    <input type="date" class="form-control" name="date"  value="{{$media->date}}">
                </div>
                <div class="mb-3">
                    <label for="url" class="form-label fw-bold">Lieu vere L'article</label>
                    <input type="text" class="form-control" name="url" value="{{$media->url}}" >
                </div>

                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
      </form>
    </div>


@endsection
