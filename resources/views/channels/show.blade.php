@extends('layouts.app')

@section('content')
<div class="container">
    <div class="bg-primary text-center">
        <div class="p-2">
            <img src="{{$channel->image}}" class="img-fluid img-thumbnail" alt="Channel Image">
        </div>
    </div>
    <div class="mt-2">
        <div class="d-flex justify-content-between">
            <h1 class="m-0">{{$channel->name}}</h1>
            <a href="/channels/{{$channel->id}}/videos" class="btn btn-info text-uppercase pt-3">Upload Video</a>
        </div>
        <small class="badge badge-secondary">10 Subcribers</small>
        <p class="mt-3">{{ $channel->description }}</p>
    </div>

    <div>
        <h5>Uploads</h5>
    </div>

    <div class="row row-cols-3">
        @if (count($videos) > 0)
            @foreach ($videos as $video)
                <div class="col mb-4">
                    <div class="card border" style="text-align:center; display:block; background-color:black; color:white;">
                        <video controls width="320" height="240" preload="auto">
                            <source src="{{$video->path}}" type="{{$video->type}}" data-setup="{}">
                            Your browser does not support the video tag.
                        </video>
                        <div class="dropdown-divider"></div>
                        <div class="card-body">
                            <h4 class="card-title">{{ $video->title }}</h4>
                            <p class="card-text">{{ $video->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
        <div class="p-4">
            <p>This channel does not contain any videos. Maybe upload one?</p>
        </div>
        @endif
    </div>
    
</div>
@endsection
