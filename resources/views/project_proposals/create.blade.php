@extends('layouts.dashboard.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center min-vh-100 p-4">
        <div class="w-100 max-w-md p-4 bg-white shadow-md">
         <h2 class="text-left mb-4">Project</h2>
            <div> 
                <x-validation-errors class="mb-4" />

            <form action="{{ route('admin.project-proposals.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="images">Images</label>
                    <input type="file" name="images" id="images" class="form-control" required>
                </div>
                <button type="submit" class="btn" style="background-color: #28a745; color: white;">Create</button>
            </form>
            </div>
        </div>
    </div>
@endsection
