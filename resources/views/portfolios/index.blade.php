@extends('layouts.dashboard.app')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="mt-14 rounded-lg border-gray-200 dark:border-gray-700">
            <h1>Portfolios</h1>
            <a href="{{ route('admin.portfolios.create') }}" class="px-4 py-2 font-bold text-white bg-green-500 hover:bg-green-700">Create New Portfolio</a>
            <div class="mt-5 row">
                @foreach($portfolios as $portfolio)
                    <div class="mb-4 col-3">
                        <div class="card h-100">
                            @if($portfolio->image)
                                <img src="{{ asset('public/storage/images/' . $portfolio->image) }}" alt="Portfolio Image" class="card-img-top portfolio-image">
                            @endif
                            <div class="card-body">
                                <form action="{{ route('admin.portfolios.destroy', $portfolio->id) }}" method="POST" style="display:inline;">
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

@section('styles')
<style>
    .card img {
        border-top-left-radius: 0.25rem;
        border-top-right-radius: 0.25rem;
    }
</style>
@endsection
