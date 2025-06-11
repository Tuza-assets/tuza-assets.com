<?php

namespace App\Http\Controllers\tenants;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class PropertyController extends Controller
{
    public function index()
    {
        // Fetch data from the API
        $response = Http::get('https://property.tuza-assets.com/api/v1/properties');
        $properties = $response->json();

        // Pass data to the view
        return view('tenants.index', compact('properties'));
    }

     public function all_property()
    {
            // Fetch the properties data from the API
            $propertyResponse = Http::get('http://property.tuza-assets.com/api/v1/properties');
            $properties = $propertyResponse->json();
        // Pass data to the view
        return view('property.all_properties', compact('properties'));
    }



    public function show($id)
    {
        // Fetch single property data from the API
        $response = Http::get("https://property.tuza-assets.com/api/v1/properties/{$id}");
        $property = $response->json();

        // Pass the property data to the view
        return view('tenants.show', ['property' => $property]);
    }
}
