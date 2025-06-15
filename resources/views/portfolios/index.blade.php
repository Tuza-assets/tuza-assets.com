@extends('layouts.dashboard.app')

@section('content')
    <div class="container-fluid bg-white py-4">
        <div class="container">
            <h1>Portfolios</h1>
            <a href="{{ route('admin.portfolios.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 ">Create New Portfolio</a>
            <div class="row mt-5">
                @foreach($portfolios as $portfolio)
                    <div class="col-3 mb-4">
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
