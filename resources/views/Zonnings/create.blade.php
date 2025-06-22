@extends('layouts.dashboard.app')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="mt-14 rounded-lg border-gray-200 dark:border-gray-700">
            <div class="p-3 bg-white rounded border shadow-md col-lg-12">
                <form action="{{ route('admin.Zonning.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('Zonnings.form', ['buttonText' => 'Create Zone'])
                </form>
            </div>
        </div>
    </div>
@endsection
