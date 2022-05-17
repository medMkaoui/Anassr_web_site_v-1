@extends('layouts.dashboard')
@section('Content')
    
<p>Learn Eclipse</p>
<br />
@php
    $data =$projet->video->first()->URL
@endphp
    
@foreach(explode('/', $data->facings) as $info) 
    <p>{{$info}}</p>
@endforeach
@endsection

