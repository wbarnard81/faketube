@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Create a new Channel</h1>


    <form class="mt-3" action="{{ route('channels.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="name">Channel Name:</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
            @error('name')
                <div class="text-danger"><small>{{ $message }}</small></div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Channel Description</label>
            <textarea type="text" class="form-control" name="description" id="description" rows=3>{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger"><small>{{ $message }}</small></div>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Channel image:</label>
            <input type="file" class="form-control-file" name='image' id="image">
            @error('image')
                <div class="text-danger"><small>{{ $message }}</small></div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
</div>
@endsection