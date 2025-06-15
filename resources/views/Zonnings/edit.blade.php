@extends('layouts.dashboard.app')

@section('content')
    <div class="container bg-white mt-2 p-4">
        <h1>Edit Zone</h1>
        <form action="{{ route('admin.Zonning.update', $Zonning->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="name" id="title" value="{{ old('name', $Zonning->name ?? '') }}" required>
            </div>
            <div class="form-group">
                <label for="contents">Zone description</label>
                <div id="content-sections">
                    <textarea id="editor" name="description">{{ old('description', $Zonning->description ?? '') }}</textarea>
                </div> 
            </div>

            <div class="form-group">
                <label for="images">Zone cover images</label>
                <input type="file" name="images[]" class="form-control-file" id="images" multiple>
            </div>

            <div class="form-group">
                <label>Current Images</label>
                <div>
                    @php
                        $images = is_string($Zonning->images) ? json_decode($Zonning->images, true) : $Zonning->images;
                    @endphp
                    @if(is_array($images))
                        @foreach($images as $image)
                            <img src="{{ $image }}" class="img-thumbnail" style="width:100px;height:100px" alt="Zone Image">
                        @endforeach
                    @else
                        <img src="{{ asset('public/storage/default.jpg') }}" class="img-thumbnail" style="width:100px;height:100px" alt="Default Image">
                    @endif
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn" style="background:#1D940F;color:white;">Update</button>
            </div>
        </form> 
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });
        </script>
    </div>
@endsection
