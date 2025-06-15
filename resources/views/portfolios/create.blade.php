@extends('layouts.dashboard.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center min-vh-100 p-4">
        <div class="w-100 max-w-md p-4 bg-white shadow-md">
          <h1>Create New Portfolio</h1>
        <form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" class="form-control" required>
            </div>
           <button type="submit" class="btn" style="background-color: #28a745; color: white;">Submit</button>
        </form>
       </div>
    </div>
@endsection