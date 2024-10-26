@extends('layout.app')

@section('content')
    <div class="col-12">
        <h1 class="p-3 border text-center my-3">All Posts</h1>
    </div>
    <div class="col-12">
        @foreach ($posts as $post)
            <div class="card mb-3">
                <h5 class="card-header">{{$post->user->name }} - {{$post->created_at->format('y / m / d')}}</h5>
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{\Str::limit($post->description,50)}}</p>
                    <a href="{{url('posts/'.$post->id)}}" class="btn btn-primary">show post</a>
                </div>
            </div>
        @endforeach
    </div>
    <div>
        {{$posts->links()}}
    </div>
@endsection
