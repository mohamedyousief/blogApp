@extends('layout.app')

@section('content')
    <div class="col-12 my-3">
        <a href="{{ url('posts/create') }}" class="btn btn-primary">add new post</a>
        <h1 class="p-3 border text-center my-3">view All Posts</h1>
    </div>
    <div class="col-12">
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
            @if (session()->get('success'))
                
                <h3 class="text-success">{{session()->get('success')}}</h3>
                
            @endif
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>title</th>
                    <th>description</th>
                    <th>writer</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post['title'] }}</td>
                        <td>{{ \Str::limit($post->description,50)}}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>
                            <a href="{{ url('posts/' . $post->id . '/edit') }}" class="btn btn-info">edit</a>
                        </td>
                        <td>
                            <form action="{{ url('posts/' . $post->id) }} " method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{$posts->links()}}
        </div>
    </div>
@endsection
