@extends('layouts.dashboard.app')

@section('styles')
<style>
    .post-category {
        background-color: #17a2b8;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        display: inline-block;
    }
    .post-meta {
        margin-bottom: 20px;
    }
    .recent-post img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        margin-right: 15px;
    }
    .sidebar .list-group-item {
        border: none;
        padding-left: 0;
        display: flex;
        align-items: center;
    }
    .sidebar .list-group-item:hover {
        background-color: transparent;
    }
    .carousel-item img {
        width: 100%;
        height: 400px;
        object-fit: cover;
    }
    .carousel-control-prev-icon, .carousel-control-next-icon {
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 50%;
    }
</style>
@endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                @if(!empty($Zonning->images))
                    <div id="imageCarousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach(json_decode($Zonning->images, true) as $index => $image)
                                <li data-target="#imageCarousel" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
                            @endforeach
                        </ol>

                        <div class="carousel-inner">
                            @foreach(json_decode($Zonning->images, true) as $index => $image)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ $image }}" class="d-block w-100" alt="Post Image">
                                </div>
                            @endforeach
                        </div>

                        <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                @endif
                <div class="card-body">
                    <div class="post-meta">
                        <span>{{ $Zonning->author ?? 'Admin' }}</span> |
                        <span>{{ \Carbon\Carbon::parse($Zonning->published_at)->format('m-d-Y') }}</span> |
                        <span class="post-category">{{ $Zonning->name }}</span>
                    </div>
                    <h5 class="card-title">{{ $Zonning->name }}</h5>
                    <p class="card-text">{!! $Zonning->description !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
