@extends('layout.app')

@section('content')
    <div class="col-12">
        <h1 class="p-3 border text-center my-3">All Posts</h1>
    </div>
    <div class="col-12">
        @foreach ($posts as $post)
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between" >
                    <h3>{{$post->user->name}} - {{$post->created_at->format("d / m / y")}}</h3>
                    <img src="{{$post->user->image()}} " width="50px" height="50px" alt="">
                </div>
                <div class="card-body">
                    <img src="{{$post->image()}}" alt="" width="100%" >
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
