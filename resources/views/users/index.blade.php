@extends('layouts.app')

@section('content')
    <h1 class="text-center my-5">Contacts Page</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card card-header">Contacts</div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <ul class="list-group">
                        @foreach ($contacts as $contact)
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-5">{{ $contact->fullName }}</div>
                                    <div class="col-md-5">{{ $contact->birthday }}</div>
                                    <div class="col-md-2">
                                        <a href="{{ route('users.edit', $contact->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form class="d-inline" action="{{ route('users.destroy', $contact->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
