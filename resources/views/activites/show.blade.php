@extends('layouts.dashboard')
@section('Content')
    
<p>Learn Eclipse</p>
<br />
<iframe width="560" height="315" src="{{$activite->video->first()->URL}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
@endsection

