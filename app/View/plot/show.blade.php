<x-guest-layout>
    <div class="container mt-5">
        <div class="card">
            <img src="{{ $property['featured_photo'] }}" class="card-img-top" alt="Plot Photo">
            <div class="card-body bg-warning text-white">
                <h2 class="card-title">{{ $property['province'] ?? 'Unknown Province' }}, {{ $property['district'] ?? 'Unknown District' }}</h2>
                <p class="card-text">Sector: {{ $property['sector'] ?? 'Unknown Sector' }}</p>
                <p class="card-text">Cell: {{ $property['cell'] ?? 'Unknown Cell' }}</p>
                <p class="card-text">Village: {{ $property['village'] ?? 'Unknown Village' }}</p>
                <p class="card-text mt-2">UPI: {{ $property['upi'] }}</p>
                <p class="card-text">Plot size: {{ $property['size'] }} {{ $property['measure'] ?? 'm²' }}</p>
                <p class="card-text">Min Cost: {{ $property['min_price'] }} {{ $property['currency'] }}</p>
                <p class="card-text">Max Cost: {{ $property['max_price'] }} {{ $property['currency'] }}</p>
            </div>
            <div class="card-body">
                @if($property['descriptions'])
                    <h3 class="card-title">Description</h3>
                    <p class="card-text">{{ $property['descriptions'] }}</p>
                @endif

                @if($property['google_map'])
                    <h3 class="card-title mt-4">Location</h3>
                    <div class="mt-2">
                        <iframe src="{{ $property['google_map'] }}" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                @endif

                @if(is_array($property['photos']) && count($property['photos']) > 0)
                    <h3 class="card-title mt-4">Photos</h3>
                    <div class="row mt-2">
                        @foreach($property['photos'] as $photo)
                            <div class="col-md-6 mb-3">
                                <img src="{{ $photo }}" alt="Additional Photo" class="img-fluid rounded">
                            </div>
                        @endforeach
                    </div>
                @endif

                @if(is_array($property['mp_files']) && count($property['mp_files']) > 0)
                    <h3 class="card-title mt-4">Documents</h3>
                    <ul class="list-unstyled mt-2">
                        @foreach($property['mp_files'] as $file)
                            <li><a href="{{ $file }}" target="_blank" class="text-primary">View Document</a></li>
                        @endforeach
                    </ul>
                @endif

                @if($property['land_ownership'])
                    <h3 class="card-title mt-4">Land Ownership</h3>
                    <p class="card-text">{{ $property['land_ownership'] }}</p>
                @endif
            </div>
        </div>
    </div>
</x-guest-layout>
