<x-guest-layout>
    <div class="container">
        <div class="row">
            @foreach ($properties as $property)
                <div class="col-md-3 listing-card">
                    <a href="{{ route('api-property-v2.show', $property['id']) }}" style="text-decoration: none;">
                        <div class="card">
                            <img src="{{ $property['thumbnail']['image'] }}" class="card-img-top" alt="House Image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $property['name'] }}</h5>
                                <p class="card-text">{{ \Illuminate\Support\Str::limit($property['description'], 100) }}
                                </p>
                                <div class="details">
                                    <p><i class="fas fa-home"></i> {{ $property['type'] }}</p>
                                    <p><i class="fas fa-shield-alt"></i> {{ $property['utilities'] }}</p>
                                    <p><i class="fas fa-map-marker-alt"></i> {{ $property['district'] }},
                                        {{ $property['sector'] }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-guest-layout>
