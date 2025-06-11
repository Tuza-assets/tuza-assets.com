@extends('layouts.web')
<link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">

@section('content')

<section class="bg-success text-white text-center py-5">
    <div class="container mb-4">
    </div>
</section> 

<section class="text-white text-center py-5">
    <div class="container">
        <div class="container mx-auto p-4 min-h-screen overflow-auto">
            <h1 class="text-3xl font-semibold mb-4">All Media for {{ $property->name }}</h1>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @if (is_array($property->images))
                    @foreach($property->images as $image)
                    
                    <div class="card text-white py-3 cursor-pointer" 
                         style="background-image: url('{{ asset('public/' . (is_string($image) ? $image : $image['path'])) }}'); 
                                background-size: cover; background-position: center;"
                         onclick="openModal('{{ asset('public/' . (is_string($image) ? $image : $image['path'])) }}')">
                        
                        <!-- Card Content -->
                        <div class="card-body h-64 overflow-hidden">
                        </div>
                    </div>

                    @endforeach
                @else
                    <p>No images available.</p>
                @endif
            </div>
        </div>
    </div>
    
</section>

<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <!--<h5 class="modal-title" id="imageModalLabel">Image Preview</h5>-->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="" id="modalImage" class="w-full h-full object-cover">
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function openModal(imageUrl) {
        document.getElementById('modalImage').src = imageUrl;
        $('#imageModal').modal('show');
    }
</script>
