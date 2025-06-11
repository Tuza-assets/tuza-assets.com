<!DOCTYPE html>
@extends('layouts.dashboard.blogs-layout')

@section('content')
    <div class="container bg-white mt-2 p-4">
        <h1>Edit Blog</h1>
        <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                    <div class="form-group col-6">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title"
                            value="{{ old('title', $blog->title ?? '') }}" required>
                    </div>
                     <div class="form-group col-6 d-flex">
                         <div class="w-75">
                        <label for="category_id">Category</label>
                        @php
                            $categories = App\Models\BlogCategory::all();
                        @endphp
                        <select class="form-control" name="category_id" id="category_id">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $blog->category_id) == $category->id ? 'selected' : '' }}>
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
               <div class="col-md-12">
                    <div class="form-group">
                        <label for="summary">Summary</label>
                        <textarea class="form-control" name="summary" id="summary" rows="3">{{ old('summary', $blog->summary ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="contents">Blog description</label>
                        <textarea id="content" name="contents">{{ old('contents', $blog->contents ?? '') }}</textarea>
                    </div>
                 </div>
                <div class="col-md-6">
                        <div class="form-group">
                        <label for="auth_name">Author Name</label>
                        <input type="text" class="form-control" name="Authname" id="auth_name"
                            value="{{ old('auth_name', $blog->Authname ?? '') }}" required>
                    </div>
                    
                    
                    <!--<div class="col-md-6">-->
                    <!--    <div class="form-group">-->
                    <!--    <label for="auth_name">Author Name</label>-->
                    <!--    <input type="text" class="form-control" name="Authname" id="auth_name"-->
                    <!--        value="{{ old('auth_name', $blog->slug ?? '') }}" required>-->
                    <!--</div>-->
                    
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="draft" {{ old('status', $blog->status ?? '') === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status', $blog->status ?? '') === 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                    </div>
              </div>

                <div class="col-md-12">
                    <div class="form-group d-flex flex-column">
                        <label for="images">Blog cover image</label>
                        <input type="file" class="form-control-file" name="images" id="images">
                        @if($blog->images)
                            <img src="{{ asset('storage/' . $blog->images) }}" class="img-thumbnail mt-2" style="width: 100px; height: 100px;" alt="Blog Image">
                        @endif
                    </div>

                    <div class="form-group mt-3">
                        <button type="submit" class="btn" style="background:#1D940F;color:white;">Update</button>
                    </div>
                </div>
            </div>

        </form>
        
        
        
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
