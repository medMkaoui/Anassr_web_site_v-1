@extends('layouts.dashboard')

@section('Content')
    <div class="px-4 py-5 my-1 text-center">
        <h1 class="display-5 fw-bold">Create un noveau partenair</h1>
        <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Sur cette page, vous devez entrer toutes les informations requises pour qu'elles soient affichées à l'endroit approprié. Ceci afin de permettre un meilleur contrôle sur les informations affichées sur votre site afin qu'elles ne soient pas dépendantes</p>
        <hr>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="{{route('partenaires')}}" class="btn btn-primary btn-lg px-4 gap-3">Tout les Partenairs</a>
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

        <form action="{{route('partenaire/update', $partenaire->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Logo</label>
                    <input type="file" class="form-control" name="logo" value="{{$partenaire->logo}}">
                </div>
                <div class="mb-3">
                    <label for="detail" class="form-label fw-bold">nom de vtre partenaire</label>
                    <textarea  class="form-control" name="name"> {{$partenaire->name}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="responsable" class="form-label fw-bold">Url de leur Site web</label>
                    <input type="text" class="form-control" name="url"  value="{{$partenaire->url}}">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </div>
      </form>
    </div>


@endsection
