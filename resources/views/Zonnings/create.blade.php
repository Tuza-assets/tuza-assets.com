@extends('layouts.dashboard.app')

@section('content')
<div class="container-fluid bg-white">
      <div class="row ">
            <div class="col-lg-12 border  bg-white rounded shadow-md p-3">
    
    <form action="{{ route('admin.Zonning.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('Zonnings.form', ['buttonText' => 'Create Zone'])
    </form>
    </div>
    </div>
</div>
@endsection