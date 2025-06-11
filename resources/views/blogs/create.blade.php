<!DOCTYPE html>
@extends('layouts.dashboard.blogs-layout')

@section('content')
<div class="container-fluid bg-white">
    <div class="row">
        <div class="col-lg-12 border bg-white rounded shadow-md p-3">
            <h1>Rich Text Editor</h1>

            <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-2 gap-4"> <!-- Grid layout with 2 columns -->

                    <!-- Title -->
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>
                    </div>

                    <!-- Category -->
                    <div class="form-group d-flex ">
                        <div class="w-75">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id" id="category_id">
                            @php
                                $categories = \App\Models\BlogCategory::where('status', true)->get();
                            @endphp
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        </div>
                        <div class="px-3">
                            <!-- Add Category Button -->
                            <button type="button" class="ml-2 btn btn-sm btn-primary" data-toggle="modal" data-target="#addCategoryModal">
                                Add Category
                            </button>
                        </div>
                    </div> 

                    <!-- Summary -->
                    <div class="form-group col-span-2"> <!-- Full width in grid -->
                        <label for="summary">Summary</label>
                        <textarea class="form-control" name="summary" id="summary" rows="3">{{ old('summary') }}</textarea>
                    </div>

                    <!-- Blog Description -->
                    <div class="form-group col-span-2"> <!-- Full width in grid -->
                        <label for="contents">Blog Description</label>
                        <div id="content-sections">
                            <textarea id="content" name="contents"></textarea>
                        </div>
                    </div>

                    <!-- Authname -->
                    <div class="form-group">
                        <label for="Authname">Author Name</label>
                        <input type="text" class="form-control" name="Authname" id="Authname" value="{{ old('Authname') }}" required>
                    </div>

                    <!-- Status -->
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                    </div>

                    <!-- Blog Cover Image -->
                    <div class="form-group col-span-2 d-flex flex-column"> <!-- Full width in grid -->
                        <label for="images">Blog Cover Image</label> 
                        <input type="file" class="form-control-file" name="images" id="images">
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group col-span-2"> <!-- Full width in grid -->
                        <button type="submit" class="btn btn-lg btn-primary">Create</button>
                    </div>

                </div> <!-- End of grid layout -->
            </form>
        </div>
    </div>
    
    <!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.blog-categories.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" name="name" id="category_name" required>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
