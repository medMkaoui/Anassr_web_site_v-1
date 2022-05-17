@extends('layouts.dashboard')

@section('Content')
<div class="px-4 py-5 my-1 text-center">
    <h1 class="display-5 fw-bold">Votre équipe</h1>
    <div class="col-lg-6 mx-auto">
    <p class="lead mb-4">Sur cette page, vous devez entrer toutes les informations requises pour qu'elles soient affichées à l'endroit approprié. </p>
    <hr>
    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        {{-- <a  href="{{route('register')}}" class="btn btn-primary btn-lg px-4 gap-3">Nouvau membre</a> --}}
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

{{-- tables_of_members --}}
<div class="container">
    
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <div class="row">
            <h6 class="col">Information de Users</h6>
            <div class="col search">
              <div class="button_save">
              <a class="btn bg-gradient-primary mt-3 w-100" href="{{route('register')}}">Nouveau User</a>
            </div>
            </div>
            
          </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Nom</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mot de passe</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $item)
                  <tr>
                    
                    <td>
                      <h6 class="mb-0 text-sm">{{$item->name}}</h6>
                    </td>
                    <td>
                      <h6 class="mb-0 text-sm">{{$item->email}}</h6>
                    </td>
                    {{-- <td class="align-middle text-center text-sm">
                     
                      <span class="badge badge-sm bg-gradient-success">{{$item->password}}</span>
                    </td> --}}
                   
                   
                    <td class="align-middle">
                      <a href="{{route('user/edit',$item->id)}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        Modifie
                      </a>
                    </td>
                    <td class="align-middle">
                      <a href="{{route('user/destroy',$item->id)}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
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
</div>


@endsection