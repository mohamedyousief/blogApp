@extends('layout.app')

@section('content')
    <div class="col-12 my-3">
        <a href="{{ route('users.create') }}" class="btn btn-primary">add new user</a>
        <h1 class="p-3 border text-center my-3">view All users</h1>
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
                <h3 class="text-success">{{ session()->get('success') }}</h3>
            @endif
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>name</th>
                    <th>email</th>
                    <th>image</th>
                    <th>type</th>
                    <th>posts</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><img src="{{ $user->image() }}" alt="" width="80px" height="80px"></td>
                        <td ><span class="{{$user->type=="admin" ? "bg-success" : "bg-warning"}} text-light p-1 rounded-4">{{ $user->type }}</span></td>
                       
                        <td>
                            <a href="{{ route('user.posts' , $user->id ) }}" class="btn btn-primary">view</a>
                        </td>
                        <td>
                            <a href="{{ route('users.edit' , $user->id ) }}" class="btn btn-info">edit</a>
                        </td>
                        <td>
                            <form action="{{ route('users.destroy' , $user->id ) }} " method="POST">
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
            {{ $users->links() }}
        </div>
    </div>
@endsection
