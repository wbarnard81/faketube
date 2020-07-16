@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Upload a new Video</h1>


    <form class="mt-3" action="/channels/{{$channelId}}/videos" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="title">Video Title:</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
            @error('title')
                <div class="text-danger"><small>{{ $message }}</small></div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Video Description</label>
            <textarea type="text" class="form-control" name="description" id="description" rows=3>{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger"><small>{{ $message }}</small></div>
            @enderror
        </div>
        <div class="form-group">
            <label for="video">Select Video File:</label>
            <p class="text-danger"><small>(MP4 Files Only)</small></p>
            <input type="file" accept="video/mp4" class="form-control-file" name='video' id="video">
            @error('video')
                <div class="text-danger"><small>{{ $message }}</small></div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
</div>
@endsection