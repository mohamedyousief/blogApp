@extends('layout.app')

@section('content')
    <div class="col-12">
        <h1 class="p-3 text-center my-3">Add New Post</h1>
    </div>
    <div class="col-8 mx-auto border p-3">
        <form action="{{ url('posts/' . $post->id) }}" class="form" method="post">
            <div class="mb-3">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
            </div>
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="">post titel</label>
                <input type="text" name="title" class="form-control" value="{{ $post->title }}">
            </div>
            <div class="mb-3">
                <label for="">post description</label>
                <textarea name="description" rows="7" class="form-control">{{ $post->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="">post writer</label>
                <select name="user_id" class="form-control" value="{{ $post->user_id }}">
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-success" value="Add Post">
            </div>
        </form>
    </div>
@endsection
