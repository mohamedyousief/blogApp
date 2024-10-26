@extends('layout.app')

@section('content')
    <div class="col-12">
        <h1 class="p-3 text-center my-3">update user</h1>
    </div>
    <div class="col-8 mx-auto border p-3">
        <form action="{{ route('users.update',$user->id) }}" class="form" method="POST">
            @method("PUT")
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
            @csrf
            <div class="mb-3">
                <label for="">user name</label>
                <input type="text" name="name" class="form-control" value="{{$user->name}}">
            </div>
            <div class="mb-3">
                <label for="">email</label>
                <input type="email" name="email" class="form-control " value="{{$user->email}}">
            </div>
            <div class="mb-3">
                <label for="">password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">confirm password</label>
                <input type="password" name="confirm_password" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">user type</label>
                <select name="type" class="form-control">
                    <option @selected($user->type=="admin") value="admin">admin</option>
                    <option @selected($user->type=="writer") value="writer">writer</option>
                </select>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-success" value="update user">
            </div>
        </form>
    </div>
@endsection
