@extends('layouts.dashboard.app')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="mt-14 bg-white container-fluid">
            <h1>Project Proposals Image</h1>
            <a href="{{ route('admin.project-proposals.create') }}"
                class="px-4 py-2 font-bold text-white bg-green-500 hover:bg-green-700">Create Proposal</a>
            @if ($message = Session::get('success'))
                <div class="mt-2 alert alert-success">
                    {{ $message }}
                </div>
            @endif

            <!-- Card container -->
            <div class="py-5 row">
                @foreach ($proposals as $proposal)
                    <div class="mb-4 col-md-3">
                        <div class="card">
                            <img src="{{ asset('project_proposals/' . $proposal->images) }}" class="card-img-top"
                                alt="{{ $proposal->title }}" style="height: 200px; object-fit: cover;">
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
    </div>
@endsection
