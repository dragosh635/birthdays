@extends('layouts.app')
@section('content')
    <h1 class="text-center my-5">Create User</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Add friend</div>
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="first_name" class="form-control" placeholder="First Name"/>
                        </div>
                        <div class="form-group">
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name"/>
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Email"/>
                        </div>
                        <div class="form-group">
                            <input type="date" name="birthday" class="form-control" placeholder="Birthday"/>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password"/>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
