@extends('layouts.dashboard')
@section('Content')
    
<p>Learn Eclipse</p>
<br />
@foreach ($projet->video as $item)
    @php
        $i=0;
        $lien =  "https://www.youtube.com/embed/"
    @endphp

    @if ($item->URL !='')
    @foreach(explode('/', $item->URL) as $info) 

        @if ($i==3)
            @php
                $lien =$lien . $info
            @endphp
        
        @endif
            

        @php
            $i++
        @endphp
    
    
    @endforeach
    @endif

    <iframe width="560" height="315" src=" {{$lien}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
@endforeach

   
@endsection

