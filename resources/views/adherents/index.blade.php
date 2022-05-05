@extends('layouts.dashboard')

@section('Content')

<div class="container">
    <div class="row">
      
        <div class="px-2 py-5 my-2 text-center">
            <h1 class="display-5 fw-bold">Adherents</h1>
            <div class="col-lg-6 mx-auto">
              <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit.</p>
              <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="{{route('adherent/create')}}" type="button" class="btn btn-primary btn-lg px-4 gap-3">Nouveau adherent</a>
              </div>
            </div>
        </div>
      
    </div>
    <div class="row">
        
            @foreach ($adherents as $item)
                
                <div class="card my-3 " style="width: 18rem;">
                    <img src="{{asset($item->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h3 class="card-title">{{$item->first_name}} {{$item->last_name}}</h3>
                      <p  class="">{{$item->nationalite}} / {{$item->ville}}</p>
                      <p class="card-text">{{$item->adresse}}</p>
                      <div class="col">
                        <a href="{{route('adherent/edit',$item->id)}}" class="btn btn-primary"><i class='bx bx-edit-alt'></i></a>
                        <a href="{{route('adherent/destroy',$item->id)}}" class="btn btn-danger"><i class='bx bx-trash'></i></a>
                        <a href="{{route('adherent/show',$item->id)}}" class="btn btn-success"><i class='bx bx-show-alt'></i></a>
                      </div>
                      
                    </div>
                  </div>
                </div>
              
            @endforeach
        
        
  </div>
</div>
@endsection