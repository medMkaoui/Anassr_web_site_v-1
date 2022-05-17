@extends('layouts.dashboard')

@section('Content')
    <div class="px-4 py-5 my-1 text-center">
        <h1 class="display-5 fw-bold">Create un noveau momber de votre team</h1>
        <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Sur cette page, vous devez entrer toutes les informations requises pour qu'elles soient affichées à l'endroit approprié. Ceci afin de permettre un meilleur contrôle sur les informations affichées sur votre site afin qu'elles ne soient pas dépendantes</p>
        <hr>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="{{route('teams')}}" class="btn btn-primary btn-lg px-4 gap-3">Tout les membres</a>
        </div>
        </div>
    </div>
    
    @if($errors->any())
        <div class="alert alert-danger">
            <p><strong>Opps quelque chose s'est mal passé</strong></p>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
    
    {{-- Form_for create a new member --}}
    <div class="container">
        <form action="{{route('team/store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                <label for="first_name" class="form-label">Prénom</label>
                <input type="text" class="form-control"name="first_name" placeholder="entrer votre Prénom" >
                </div>
                <div class="mb-3">
                <label for="last_name" class="form-label">Nom</label>
                <input type="text" class="form-control" name="last_name" placeholder="entrer votre Nom" >
                </div>
                <div class="mb-3">
                <label for="statu" class="form-label">Statu</label>
                <input type="text" class="form-control"name="statu" placeholder="entrer votre statu" >
                </div>
                <div class="mb-3">
                <label for="photo" class="form-label">Image</label>
                <input type="file" class="form-control"name="photo" placeholder="entrer votre photo" >
                
                </div>

                <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                {{-- <input type="text" class="form-control" name="last_name" placeholder="entrer votre Nom" > --}}
                <textarea name="description" class="form-control"  cols="30" rows="10"></textarea>
                </div>
                <div class="mb-3">
                <label for="mail" class="form-label">E-mail</label>
                <input type="text" class="form-control" name="mail" placeholder="entrer votre mail" >
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
@endsection