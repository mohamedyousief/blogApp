@extends('layout.app')

@section('content')
    <div class="col-12">
        <h1 class="p-3 text-center my-3">Add New user</h1>
    </div>
    <div class="col-8 mx-auto border p-3">
        <form action="{{ route('users.store') }}" class="form" method="POST">
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
                <input type="text" name="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">email</label>
                <input type="email" name="email" class="form-control">
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
                    <option value="admin">admin</option>
                    <option value="writer">writer</option>
                </select>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-success" value="Add user">
            </div>
        </form>
    </div>
@endsection
