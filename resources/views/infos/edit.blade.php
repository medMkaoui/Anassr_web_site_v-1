@extends('layouts.dashboard')

@section('Content')
    <div class="px-4 py-5 my-1 text-center">
        <h1 class="display-5 fw-bold">Informations Générale de l'association</h1>
        <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Sur cette page, vous devez entrer toutes les informations requises pour qu'elles soient affichées à l'endroit approprié. Ceci afin de permettre un meilleur contrôle sur les informations affichées sur votre site afin qu'elles ne soient pas dépendantes</p>
        <hr>
        </div>
    </div>

    {{-- form_edit --}}

    <div class="container">
        <form action="{{route('info/update',$info->id)}}" method="POST">
       @csrf
       @method('POST')
            <legend>Information générale</legend>
            <div class="container">
                <div class="row">
                  <div class="col">
                    <div class="mb-3">
                        <label for="nom" class="form-label  fw-bold">Nom de l'association</label>
                        <input type="text" name="nom" class="form-control" value="{{$info->nom}}">
                      </div>
                  </div>
                  <div class="col">
                    <div class="mb-3">
                        <label for="slug" class="form-label fw-bold">Slug de l'association</label>
                        <input type="text" name="slug" class="form-control" value="{{$info->slug}}">
                      </div>
                  </div>
                  <div class="col">
                    <div class="mb-3">
                        <label for="whatsapp" class="form-label fw-bold">Whatsapp de l'association</label>
                        <input type="text" name="whatsapp" class="form-control" value="{{$info->whatsapp}}">
                    </div>
                  </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                  <div class="col">
                    <div class="mb-3">
                        <label for="fb" class="form-label fw-bold">Facebook de l'association</label>
                        <input type="text" name="fb" class="form-control" value="{{$info->fb}}">
                    </div>
                  </div>
                  <div class="col">
                    <div class="mb-3">
                        <label for="instagram" class="form-label fw-bold">Instagram de l'association</label>
                        <input type="text" name="instagram" class="form-control" value="{{$info->instagram}}">
                    </div>
                  </div>
                  <div class="col">
                    <div class="mb-3">
                        <label for="youtube" class="form-label fw-bold">Youtube de l'association</label>
                        <input type="text" name="youtube" class="form-control" value="{{$info->youtube}}">
                    </div>
                  </div>
                </div>
              </div>
            
            
            
            
            
            <div class="mb-3">
                <label for="video_apropos" class="form-label">lien de vedio sur youtube </label>
                <input type="text" name="video_apropos" class="form-control" value="{{$info->video_apropos}}">
            </div>
            <div class="mb-3">
                <label for="video_support" class="form-label">lien de la vedio sur youtube </label>
                <input type="text" name="video_support" class="form-control" value="{{$info->video_support}}">
            </div>
            <div class="mb-3">
                <label for="rib" class="form-label">RIB  de banque de l'association </label>
                <input type="text" name="rib" class="form-control" value="{{$info->rib}}">
            </div>
            <div class="mb-3">
                <label for="nom_banque" class="form-label">nom de la banque de l'association</label>
                <input type="text" name="nom_banque" class="form-control" value="{{$info->nom_banque}}">
            </div>
            <div class="mb-3">
                <label for="tel_trisorie" class="form-label">telephon trisorie de l'association </label>
                <input type="text" name="tel_trisorie" class="form-control" value="{{$info->tel_trisorie}}">
            </div>
            <div class="mb-3">
                <label for="adresse" class="form-label">adresse de l'association</label>
                <input type="text" name="adresse" class="form-control" value="{{$info->adresse}}">
            </div>
            <div class="mb-3">
                <label for="mot_president" class="form-label">adresse de l'association</label>
                {{-- <input type="text" name="adresse" class="form-control" value="{{$info->adresse}}"> --}}
                <textarea name="mot_president" class="form-control" cols="30" rows="10">{{$info->mot_president}}</textarea>
            </div>
            <div class="mb-3">
                <label for="vision" class="form-label">adresse de l'association</label>
                {{-- <input type="text" name="adresse" class="form-control" value="{{$info->adresse}}"> --}}
                <textarea name="vision" class="form-control" cols="30" rows="10">{{$info->vision}}</textarea>
            </div>
            <div class="mb-3">
                <label for="how_we_work" class="form-label">adresse de l'association</label>
                {{-- <input type="text" name="adresse" class="form-control" value="{{$info->adresse}}"> --}}
                <textarea name="how_we_work" class="form-control" cols="30" rows="10">{{$info->how_we_work}}</textarea>
            </div>
            <div class="mb-3">
                <label for="how_support_us" class="form-label">adresse de l'association</label>
                {{-- <input type="text" name="adresse" class="form-control" value="{{$info->adresse}}"> --}}
                <textarea name="how_support_us" class="form-control" cols="30" rows="10">{{$info->how_support_us}}</textarea>
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
@endsection