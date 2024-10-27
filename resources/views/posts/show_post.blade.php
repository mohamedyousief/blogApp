@extends('layout.app')

@section('content')
    <div class="col-12">
        <h1 class="p-3 border text-center my-3">show post</h1>
    </div>
    <div class="col-12">
            <div class="card mb-3">
                <h5 class="card-header">{{$post->user->name }} - {{$post->created_at->format('y / m / d')}}</h5>
                <div class="card-body">
                    <img src="{{$post->image()}}" alt="" width="100%" >
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->description}}</p>
                </div>
            </div>
    </div>
@endsection
