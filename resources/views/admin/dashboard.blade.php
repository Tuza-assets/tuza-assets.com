@extends('layouts.dashboard.app')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="dark:border-gray-700 mt-14">
            <div class="px-3 content">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="p-0 mb-0 page-title">Dashboard</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="px-3 row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">WELCOME {{ Auth::user()->name }}</h4>
                    </div>
                </div>

                <div class="container my-5">
                    <div class="row">
                        {{-- Total Designs --}}
                        <div class="mb-4 col-xl-3 col-md-6">
                            <a href="{{ route('admin.design') }}" style="text-decoration: none; color: inherit;">
                                <div class="card hover:shadow-lg transition">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between p-md-1">
                                            <div class="flex-row d-flex">
                                                <div class="align-self-center">
                                                    <i class="fas fa-pencil-alt text-info fa-3x me-4"></i>
                                                </div>
                                                <div>
                                                    <h4>Total Designs</h4>
                                                    <p class="mb-0">Total entries in Designs</p>
                                                </div>
                                            </div>
                                            <div class="align-self-center">
                                                <h2 class="mb-0 h1">{{ \App\Models\Design::count() }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        {{-- Total Properties on Sell --}}
                        <div class="mb-4 col-xl-3 col-md-6">
                            <a href="{{ route('admin.properties.index') }}" style="text-decoration: none; color: inherit;">
                                <div class="card hover:shadow-lg transition">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between p-md-1">
                                            <div class="flex-row d-flex">
                                                <div class="align-self-center">
                                                    <i class="fas fa-home text-info fa-3x me-4"></i>
                                                </div>
                                                <div>
                                                    <h4>Total Property on Sell</h4>
                                                    <p class="mb-0">Total Property on sell</p>
                                                </div>
                                            </div>
                                            <div class="align-self-center">
                                                <h2 class="mb-0 h1">{{ \App\Models\PropertyOnSell::count() }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        {{-- Total Contacts --}}
                        <div class="mb-4 col-xl-3 col-md-6">
                            <a href="{{ route('admin.contact') }}" style="text-decoration: none; color: inherit;">
                                <div class="card hover:shadow-lg transition">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between p-md-1">
                                            <div class="flex-row d-flex">
                                                <div class="align-self-center">
                                                    <i class="far fa-address-book text-warning fa-3x me-4"></i>
                                                </div>
                                                <div>
                                                    <h4>Total Contacts</h4>
                                                    <p class="mb-0">Total entries in Contacts</p>
                                                </div>
                                            </div>
                                            <div class="align-self-center">
                                                <h2 class="mb-0 h1">{{ \App\Models\Contact::count() }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        {{-- Total Magazines --}}
                        <div class="mb-4 col-xl-3 col-md-6">
                            <a href="{{ route('admin.magazine') }}" style="text-decoration: none; color: inherit;">
                                <div class="card hover:shadow-lg transition">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between p-md-1">
                                            <div class="flex-row d-flex">
                                                <div class="align-self-center">
                                                    <i class="far fa-newspaper text-success fa-3x me-4"></i>
                                                </div>
                                                <div>
                                                    <h4>Total Magazines</h4>
                                                    <p class="mb-0">Total entries in Magazines</p>
                                                </div>
                                            </div>
                                            <div class="align-self-center">
                                                <h2 class="mb-0 h1">{{ \App\Models\Magazine::count() }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        {{-- Total Magazine Downloads --}}
                        <div class="mb-4 col-xl-3 col-md-6">
                            <a href="#" style="text-decoration: none; color: inherit;">
                                <div class="card hover:shadow-lg transition">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between p-md-1">
                                            <div class="flex-row d-flex">
                                                <div class="align-self-center">
                                                    <i class="far fa-file-alt text-primary fa-3x me-4"></i>
                                                </div>
                                                <div>
                                                    <h4>Total Magazine Downloads</h4>
                                                    <p class="mb-0">Total entries in Magazine Downloads</p>
                                                </div>
                                            </div>
                                            <div class="align-self-center">
                                                <h2 class="mb-0 h1">{{ \App\Models\MagazineDownload::count() }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
