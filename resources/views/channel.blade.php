@extends('layouts.app')

@section('content')
<div class="jumbotron m-0" style="height: 350px; background-size: cover; background-repeat: no-repeat; background-image: url({{$channel->image}});"></div>
<div class="bg-primary text-center p-4">
    <h1 class="text-white m-0">{{$channel->name}}</h1>
    <p  class="text-white m-0"><small>23 Subscribers</small></p>
    <p class="text-white m-0">{{$channel->description}}</p>
</div>

<div class="container-fluid">
        <div class="row row-cols-3">
            @if (count($channel->videos) > 0)
                @foreach ($channel->videos as $video)
                    <div class="col mb-4">
                        <div class="card border" style="text-align:center; display:block; background-color:#0F0F0F; color:white;">
                            <video controls width="320" height="240" preload="auto">
                                <source src="{{$video->path}}" type="{{$video->type}}" data-setup="{}">
                                Your browser does not support the video tag.
                            </video>
                            <div class="dropdown-divider"></div>
                            <div class="card-body">
                            <div class="media">
                                <div class="d-flex">
                                    <img src="{{$video->channel->image}}" style="object-fit: cover; height: 40px; width: 40px; border-radius: 50%;" class="mr-1" alt="Channel Logo">
                                    <div>
                                        <h5 class="m-0">
                                            <a href="/channel/{{$video->channel->id}}">{{$video->channel->name}}</a>
                                        </h5>
                                        <p class="m-0">
                                            <small>Subscribers: 12</small>
                                        </p>
                                    </div>
                                </div>    
                                <div class="media-body">
                                    <h4 class="card-title">{{ $video->title }}</h4>
                                </div>
                            </div>
                                <p class="card-text">{{ $video->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
            <div class="p-4">
                <p>Currently there are no videos to display. Maybe someone will upload one soon. 😊</p>
            </div>
            @endif
        </div>
    </div>
@endsection
