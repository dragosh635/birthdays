@extends('layouts.app')

@section('content')
    <h1 class="text-center my-5">Update Users</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header"> Update User</div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-group">
                                @foreach ($errors->all() as $error)
                                    <li class="list-group-item">
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{ old('first_name', $user->first_name ) }}"/>
                        </div>
                        <div class="form-group">
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{ old('last_name', $user->last_name) }}"/>
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email', $user->email) }}"/>
                        </div>
                        <div class="form-group">
                            <input type="date" name="birthday" class="form-control" placeholder="Birthday" value="{{ old('birthday', $user->birthday) }}"/>
                        </div>
                        <div class="form-group">
                            <img src="{{asset('storage/users/' . $user->picture)}}" alt="" width="200px" height="200px"/>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control"/>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
