@extends('layouts.dashboard')

@section('Content')

<div class="container">
    <div class="row">

        <div class="px-2 py-5 my-2 text-center">
            <h1 class="display-5 fw-bold">All Media</h1>
            <div class="col-lg-6 mx-auto">
              <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit.</p>
              <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="{{route('media/create')}}" type="button" class="btn btn-primary btn-lg px-4 gap-3">Nouveau Media</a>
              </div>
            </div>
        </div>

    </div>
    <div class="row">
        @foreach ($medias as $item)
          <div class="col justify-content-center">
              <div class="card my-3 " style="width: 18rem;">
                  <img src="{{asset($item->logo)}}" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h3 class="card-title">{{$item->name}}</h3>
                    <h6 class="card-title">{{$item->lieu}} / {{$item->date}}</h6>
                    <a href="{{$item->url}}">Voir L'article</a>
                    <div class="col">
                      <a href="{{route('media/edit',$item->id)}}" class="btn btn-primary"><i class='bx bx-edit-alt'></i></a>
                      <a href="{{route('media/destroy',$item->id)}}" class="btn btn-danger"><i class='bx bx-trash'></i></a>
                      <a href="{{route('media/show',$item->id)}}" class="btn btn-success"><i class='bx bx-show-alt'></i></a>
                    </div>

                  </div>
                </div>
          </div>
        @endforeach

  </div>
</div>
@endsection