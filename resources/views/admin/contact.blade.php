@extends('layouts.dashboard.app')


@section('content')
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Dashboard</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-white">
        <div class="row">
            <h2>Contacts</h2>
            @if ($contacts)
                @forelse ($contacts as $item)
                    <div class="col-lg-12">
                        <div class="d-flex row">
                            <span class=""> {{ $item->email }}</span><span class=""> {{ $item->tel }}</span>
                        </div>
                        <div class="">Subject: <strong> {{ $item->subject }}</strong></div>
                        <div class="">
                            {{ $item->message }}
                        </div>
                    </div>
                    <hr>
                @empty
                @endforelse
            @endif

        </div>
    </div>
@endsection
