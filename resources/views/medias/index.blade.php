@extends('layouts.dashboard')

@section('Content')

<div class="container">
    <div class="row">

        <div class="px-2 py-5 my-2 text-center">
            <h1 class="display-5 fw-bold">All Media</h1>
            <div class="col-lg-6 mx-auto">
              <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit.</p>
              <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    {{-- <a href="{{route('media/create')}}" type="button" class="btn btn-primary btn-lg px-4 gap-3">Nouveau Media</a> --}}
              </div>
            </div>
        </div>

    </div>
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <div class="row">
              <h6 class="col">Information de Media</h6>
              <div class="col search">
                <div class="button_save">
                <a class="btn bg-gradient-primary mt-3 w-100" href="{{route('media/create')}}">Nouveau Media</a>
              </div>
              </div>
              
            </div>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Logo</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Nom</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lieu</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date de presse</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">URL</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($medias as $item)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="{{asset($item->logo)}}" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            
                          </div>
                        </div>
                      </td>
                      <td>
                        <h6 class="mb-0 text-sm">{{$item->name}}</h6>
                      </td>
                      <td>
                        <h6 class="mb-0 text-sm">{{$item->lieu}}</h6>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="mb-0 text-sm">{{$item->date}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <a href="{{$item->url}}" class="badge badge-sm bg-gradient-success" data-toggle="tooltip" data-original-title="Edit user">
                          Lien ver l'article
                        </a>
                      </td>
                     
                      <td class="align-middle">
                        <a href="{{route('media/edit',$item->id)}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Modifie
                        </a>
                      </td>
                      <td class="align-middle">
                        <a href="{{route('media/destroy',$item->id)}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Supprimer
                        </a>
                      </td>
                    </tr>
                  @endforeach
                
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    


    {{-- <div class="row">
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
          </div> --}}
        

  </div>
</div>
@endsection