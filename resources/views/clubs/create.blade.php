@extends('layouts.dashboard')

@section('Content')
    <div class="px-4 py-5 my-1 text-center">
        <h1 class="display-5 fw-bold">Create un noveau clubs</h1>
        <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Sur cette page, vous devez entrer toutes les informations requises pour qu'elles soient affichées à l'endroit approprié. Ceci afin de permettre un meilleur contrôle sur les informations affichées sur votre site afin qu'elles ne soient pas dépendantes</p>
        <hr>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="{{route('clubs')}}" class="btn btn-primary btn-lg px-4 gap-3">Tout les clubs</a>
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
    {{-- Form_for create a new club --}}
    <div class="container">
        <form action="{{route('club/store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Nom de club</label>
                    <input type="text" class="form-control" name="name" >
                </div>
                <div class="mb-3">
                    <label for="responsable" class="form-label fw-bold">Responsable de club</label>
                    <input type="text" class="form-control" name="responsable"  >
                </div>
                <div class="mb-3">
                    <label for="details" class="form-label fw-bold">Description</label>
                    <textarea  class="form-control" name="details"  ></textarea>
                </div>
                <div class="mb-3">
                    <label for="hero" class="form-label fw-bold">Logo</label>
                    <input type="file" class="form-control" name="hero">
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </div>
      </form>
    </div>

@endsection
