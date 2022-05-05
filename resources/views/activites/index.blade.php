@extends('layouts.dashboard')

@section('Content')

<div class="container">
    <div class="row">
      
        <div class="px-2 py-5 my-2 text-center">
            <h1 class="display-5 fw-bold">Activites</h1>
            <div class="col-lg-6 mx-auto">
              <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit.</p>
              <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="{{route('activite/create')}}" type="button" class="btn btn-primary btn-lg px-4 gap-3">Create new Activité</a>
              </div>
            </div>
        </div>
      
      
    </div>
    <div class="row">
        @foreach ($activite as $item)
        <div class="col justify-content-center">
            <div class="card my-3 " style="width: 18rem;">
                <img src="{{asset($item->photo->first()->URL)}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h3 class="card-title">{{$item->name}}</h3>
                  <p  class="">{{$item->date_debut}} / {{$item->date_fin}}</p>
                  <p class="card-text">{{$item->detail}}</p>
                  <div class="col">
                    <a href="{{route('activite/edit',$item->id)}}" class="btn btn-primary"><i class='bx bx-edit-alt'></i></a>
                    <a href="{{route('activite/destroy',$item->id)}}" class="btn btn-danger"><i class='bx bx-trash'></i></a>
                    <a href="{{route('activite/show',$item->id)}}" class="btn btn-success"><i class='bx bx-show-alt'></i></i></a>
                  </div>
                  
                </div>
              </div>
        </div>
        @endforeach
        
  </div>
</div>
@endsection