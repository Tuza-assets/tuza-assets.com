@extends('layouts.web')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">

@section('content')

<section class="bg-success text-white text-center py-5">
    <div class="container mb-4">
    </div>
</section> 

<section class=" text-center py-5">
    <div class="container mx-auto p-4 min-h-screen overflow-auto">
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    @if($property)
        @if(count($property['property_images']) > 0)
            @foreach($property['property_images'] as $image)
                <div style="height: 200px; overflow: hidden;">
                    <img src="{{ $image['image'] }}" alt="Image for {{ $property['name'] }}" style="width: 100%; height: 100%; object-fit: cover;" onclick="openModal('{{ $image['image'] }}')">
                </div>
            @endforeach
        @else
            <p>No images available.</p>
        @endif
    @else
        <p>Property not found.</p>
    @endif
</div>

    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
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
