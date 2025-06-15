@extends('layouts.dashboard.app')

@section('content')
    <div class="container-fluid bg-white">
        <h1>Project Proposals Image</h1>
        <a href="{{ route('admin.project-proposals.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4">Create Proposal</a>
        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-2">
                {{ $message }}
            </div>
        @endif
        
        <!-- Card container -->
        <div class="row py-5">
            @foreach ($proposals as $proposal)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="{{ asset('public/storage/images/' . $proposal->images) }}" class="card-img-top" alt="{{ $proposal->title }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <form action="{{ route('admin.project-proposals.destroy', $proposal->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
