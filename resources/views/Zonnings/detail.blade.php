@extends('layouts.web')

<style>
    .post-category {
        background-color: green;
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

    .share-buttons {
        margin-top: 20px;
    }

    .share-buttons button {
        margin-right: 10px;
    }

    input:focus {
        outline: none !important;
        box-shadow: none !important;
        border-color: green !important;
    }

    textarea:focus {
        outline: none !important;
        box-shadow: none !important;
        border-color: green !important;
    }

    input.active {
        text-decoration: none !important;
    }

    textarea.active {
        text-decoration: none !important;
    }
</style>

@section('content')
<section class="hero text-white text-center py-5">
    <div class="container">
        <h1 class="display-4">TUZA ASSETS Ltd</h1>
        <p class="lead">Zoning</p>
    </div>
</section>



@endsection
