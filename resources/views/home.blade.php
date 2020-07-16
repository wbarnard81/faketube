@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    {{ __('Dashboard') }}
                    <a href="{{ route('channels.create') }}" class="btn btn-sm btn-primary">Create Channel</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (count($channels) > 0)
                        @foreach ($channels as $channel)
                        <div class="media">
                            <img src="{{ $channel->image }}" class="img-thumbnail mr-3" alt="Channel Image">
                            <div class="media-body">
                                <h5 class="mt-0"><a href="/channels/{{$channel->id}}">{{ $channel->name }}</a></h5>
                                <small class="badge badge-secondary">10 Subcribers</small>
                                <p>{{ $channel->description }}</p>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <p>You do not have any channels. Create one?</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
