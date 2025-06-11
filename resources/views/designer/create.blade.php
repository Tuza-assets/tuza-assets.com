@extends('layouts.dashboard.app')

@section('content')

<style>
    .form-control, .form-select, .form-control-line {
        border-radius: 0.375rem;
        padding: 0.75rem;
    }
    .form-control:focus, .form-select:focus {
        box-shadow: none;
        border-color: #38bdf8;
    }
    .file-preview {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 150px;
        border: 2px dashed #d1d5db;
        border-radius: 0.375rem;
        margin-top: 1rem;
        position: relative;
    }
    .file-preview img {
        max-height: 100%;
        max-width: 100%;
        border-radius: 0.375rem;
    }
    .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        border: none;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }
    .custom-button {
        background-color: #38a169; /* Green color */
        color: white;
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 0.375rem;
        transition: background-color 0.3s ease;
    }
    .custom-button:hover {
        background-color: #2f855a; /* Darker green on hover */
    }
</style>

<div class="container d-flex justify-content-center align-items-center py-5">
    <div class="col-lg-6 col-md-8 col-sm-10">
        <div class="card bg-white shadow-lg">
            <div class="card-body">
                <h2 class="mb-4">Create New Design</h2>
                <form action="{{ route('designs.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal form-material mx-2">
                    @csrf
                    <!-- Name Field -->
                    <div class="form-group">
                        <label class="col-md-12 mb-0">Name</label>
                        <div class="col-md-12">
                            <input type="text" style="padding-left:10px;padding:5px" name="name" class="form-control border" required>
                        </div>
                    </div>

                    <!-- Package Includes Field -->
                    <div class="form-group">
                        <label class="col-md-12 mb-0">Package Includes</label>
                        <div id="content-sections">
                            <textarea id="editor" name="package_includes"></textarea>
                        </div>
                    </div>

                    <!-- Price Field -->
                    <div class="form-group">
                        <label class="col-md-12 mb-0">Price</label>
                        <div class="col-md-12">
                            <input type="text" name="price" class="form-control form-control-line border" style="padding-left:10px;padding:5px" required>
                        </div>
                    </div>

                    <!-- Currency Field -->
                    <div class="form-group">
                        <label class="col-sm-12">Currency</label>
                        <div class="col-sm-12">
                            <select class="form-select shadow-none form-control-line border" style="padding-left:10px;padding:5px" name="currency">
                                <option value="Rwf">Rwf</option>
                                <option value="$">$</option>
                            </select>
                        </div>
                    </div>

                     <!-- Zone Field -->
                    <div class="form-group">
                        <label class="col-md-12 mb-0">Zone</label>
                        <div class="col-md-12">
                            <?php $zones = \App\Models\Zonning::all(); ?>
                            <select name="zone" class="form-control form-control-line border" style="padding-left:10px;padding:5px">
                                @foreach($zones as $zone)
                                    <option value="{{ $zone->name }}">{{ $zone->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <!-- Size Field -->
                    <div class="form-group">
                        <label class="col-md-12 mb-0">Size</label>
                        <div class="col-md-12">
                            <input type="text" name="size" class="form-control form-control-line border" style="padding-left:10px;padding:5px">
                        </div>
                    </div>

                    <!-- Dimensions Field -->
                    <div class="form-group">
                        <label class="col-md-12 mb-0">Dimensions</label>
                        <div class="col-md-12">
                            <input type="text" name="dimensions" class="form-control form-control-line border" style="padding-left:10px;padding:5px">
                        </div>
                    </div>

                    <!-- Number of Rooms Field -->
                    <div class="form-group">
                        <label class="col-md-12 mb-0">Number of Rooms</label>
                        <div class="col-md-12">
                            <input type="number" name="number_of_rooms" class="form-control form-control-line border" style="padding-left:10px;padding:5px">
                        </div>
                    </div>

                    <!-- Additional Information Field -->
                    <div class="form-group">
                        <label class="col-md-12 mb-0">Additional Information</label>
                        <div class="col-md-12">
                            <textarea name="additional_information"  class="form-control form-control-line border" style="padding-left:10px;padding:5px"></textarea>
                        </div>
                    </div>

                    <!-- Main Image Field -->
                    <div class="form-group">
                        <label class="col-md-12 mb-0">Main Image</label>
                        <div class="col-md-12">
                            <input type="file" name="main_image" onchange="previewImage(event, 'main_image_preview_container')" class="form-control form-control-line border" style="padding-left:10px;padding:5px">
                            <div class="file-preview" id="main_image_preview_container">
                                <img id="main_image_preview" class="hidden">
                                <button type="button" class="close-btn" onclick="removeImage('main_image_preview')">&times;</button>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Images Field -->
                    <div class="form-group">
                        <label class="col-md-12 mb-0">Additional Images</label>
                        <div class="col-md-12">
                            <input type="file" name="images[]" multiple onchange="previewImages(event)" class="form-control form-control-line">
                            <div class="file-preview" id="additional_images_preview_container">
                                <div id="additional_images_preview" class="d-flex flex-wrap"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group text-right">
                        <button type="submit" class="custom-button button-succes">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function previewImage(event, previewContainerId) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById(previewContainerId).querySelector('img');
            output.src = reader.result;
            output.classList.remove('hidden');
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    function previewImages(event) {
        var files = event.target.files;
        var previewContainer = document.getElementById('additional_images_preview');
        previewContainer.innerHTML = '';

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var reader = new FileReader();
            reader.onload = function(event) {
                var div = document.createElement('div');
                div.classList.add('position-relative', 'mr-2', 'mb-2');
                var imgElement = document.createElement('img');
                imgElement.src = event.target.result;
                imgElement.classList.add('w-16', 'h-16', 'object-cover', 'rounded');
                var closeButton = document.createElement('button');
                closeButton.type = 'button';
                closeButton.classList.add('close-btn');
                closeButton.innerHTML = '&times;';
                closeButton.onclick = function() {
                    previewContainer.removeChild(div);
                };
                div.appendChild(imgElement);
                div.appendChild(closeButton);
                previewContainer.appendChild(div);
            };
            reader.readAsDataURL(file);
        }
    }

    function removeImage(previewId) {
        var previewElement = document.getElementById(previewId);
        previewElement.src = '';
        previewElement.classList.add('hidden');
    }
</script>
