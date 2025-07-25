<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyOnSell;
use App\Models\Favority;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class PropertyOnSellController extends Controller
{
    public function index()
    {
        $properties = PropertyOnSell::all();
        return view('property_on_sell.index', compact('properties'));
    }

    public function create(Request $request)
    {
        $propertyId = $request->input('property_id');
        $property = null;

        if ($propertyId) {
            $property = PropertyOnSell::find($propertyId);
        }
        return view('property_on_sell.create', compact('property'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'upi' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'mainimage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
            'type' => 'nullable|string',
            'country' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'sector' => 'required|string|max:255',
            'cell' => 'required|string|max:255',
            'village' => 'required|string|max:255',
            'house' => 'nullable|string|max:255',
            'map_link' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
            'size' => 'required|string|max:255',
            'floor' => 'nullable|integer',
            'room' => 'nullable|integer',
            'dimension' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'currency' => 'required|string|in:RWF,USD,EUR',
            'property_type' => 'nullable|string',
            'house_type' => 'nullable|string',
            'availability' => 'nullable|string',
            'zoning_id' => 'required|string|max:255',
            'amenities' => 'nullable|array',
            'amenities.*' => 'string|in:central_heating_boiler,bathtub,renewable_energy,fireplace,swimming_pool,roof_top,cinema,gym',
            'garage_type' => 'nullable|string',
            'rooms' => 'nullable|integer',
            'bedrooms' => 'nullable|integer',
            'kitchen' => 'nullable|integer',
            'dining_room' => 'nullable|integer',
            'bathroom' => 'nullable|integer',
            'storage' => 'nullable|integer',
            'construction_type' => 'nullable|string',
            'year_of_construction' => 'nullable|integer|min:1900|max:' . date('Y'),
        ]);

        // Generate unique property code
        $year = date('Y');
        $countThisYear = PropertyOnSell::whereYear('created_at', $year)->count() + 1;
        $serial = str_pad($countThisYear, 3, '0', STR_PAD_LEFT);
        $random = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3));
        $identity = "{$year}_{$serial}_{$random}";
        $validatedData['property_code'] = $identity;

        // Handle main image
        if ($request->hasFile('mainimage')) {
            $photo = $request->file('mainimage');
            $filename = uniqid() . '.' . $photo->getClientOriginalExtension();
            $image = $this->applyWatermark($photo);
            Storage::disk('property_images')->put($filename, (string) $image->encode());
            $validatedData['mainimage'] = 'property_images/' . $filename;
        }

        // Handle additional images
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $imageFile) {
                $filename = uniqid() . '.' . $imageFile->getClientOriginalExtension();
                $image = $this->applyWatermark($imageFile);
                Storage::disk('property_images')->put($filename, (string) $image->encode());
                $images[] = 'property_images/' . $filename;
            }
            $validatedData['images'] = json_encode($images);
        }

        $property = PropertyOnSell::create($validatedData);

        return redirect()->route('admin.properties.index')->with('success', 'Property created successfully.');
    }

    public function show(PropertyOnSell $property)
    {
        return view('property_on_sell.show', compact('property'));
    }

    public function edit(PropertyOnSell $property)
    {
        return view('property_on_sell.edit', compact('property'));
    }

    public function update(Request $request, PropertyOnSell $property)
    {
        $validatedData = $request->validate([
            'upi' => 'required|string|max:255',
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'type' => 'nullable|string',
            'country' => 'nullable|string|max:255',
            'province' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'sector' => 'nullable|string|max:255',
            'cell' => 'nullable|string|max:255',
            'village' => 'nullable|string|max:255',
            'house' => 'nullable|string|max:255',
            'map_link' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'size' => 'nullable|string|max:255',
            'floor' => 'nullable|integer',
            'room' => 'nullable|integer',
            'dimension' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'currency' => 'nullable|string|in:RWF,USD,EUR',
            'property_type' => 'nullable|string',
            'house_type' => 'nullable|string',
            'availability' => 'nullable|string',
            'zoning_id' => 'nullable|string|max:255',
            'amenities' => 'nullable|array',
            'amenities.*' => 'string',
            'garage_type' => 'nullable|string',
            'rooms' => 'nullable|integer',
            'bedrooms' => 'nullable|integer',
            'kitchen' => 'nullable|integer',
            'dining_room' => 'nullable|integer',
            'bathroom' => 'nullable|integer',
            'storage' => 'nullable|integer',
            'construction_type' => 'nullable|string|in:Resale,Newly built',
            'year_of_construction' => 'nullable|integer|min:1900|max:' . date('Y'),
            'mainimage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('mainimage')) {
            if ($property->mainimage) {
                Storage::disk('property_images')->delete(basename($property->mainimage));
            }
            $image = $this->applyWatermark($request->file('mainimage'));
            $filename = uniqid() . '.' . $request->file('mainimage')->getClientOriginalExtension();
            Storage::disk('property_images')->put($filename, (string) $image->encode());
            $validatedData['mainimage'] = 'property_images/' . $filename;
        }

        if ($request->hasFile('images')) {
            if ($property->images) {
                foreach (json_decode($property->images, true) as $img) {
                    Storage::disk('property_images')->delete(basename($img));
                }
            }
            $images = [];
            foreach ($request->file('images') as $imgFile) {
                $filename = uniqid() . '.' . $imgFile->getClientOriginalExtension();
                $img = $this->applyWatermark($imgFile);
                Storage::disk('property_images')->put($filename, (string) $img->encode());
                $images[] = 'property_images/' . $filename;
            }
            $validatedData['images'] = json_encode($images);
        }

        $property->update($validatedData);

        return redirect()->back()->with('success', 'Property updated successfully.');
    }

    public function favorite(Request $request)
    {
        // Validate the email and property_id inputs
        $validatedData = $request->validate([
            'email' => 'required|email',
            'property_id' => 'required|exists:property_on_sells,id',
        ]);

        $email = $validatedData['email'];
        $propertyId = $validatedData['property_id'];

        // Check if the property has already been favorited by this email
        $favority = Favority::where('product_id', $propertyId)->where('email', $email)->first();

        if (!$favority) {
            Favority::create([
                'product_id' => $propertyId,
                'email' => $email,
            ]);
        }

        return redirect()->back()->with('success', 'Property favorited successfully.');
    }

    public function destroy($id)
    {
        $property = PropertyOnSell::findOrFail($id);

        if ($property->mainimage) {
            Storage::disk('property_images')->delete(basename($property->mainimage));
        }

        if ($property->images) {
            foreach (json_decode($property->images, true) as $img) {
                Storage::disk('property_images')->delete(basename($img));
            }
        }

        $property->delete();
        return redirect()->route('admin.properties.index')->with('success', 'Property deleted successfully.');
    }

    public function applyWatermark($image)
    {
        $img = Image::make($image->getRealPath());
        $watermark = Image::make(public_path('images/wotermarkimg.png'));

        // Resize watermark if necessary
        $watermarkSize = min($img->width() * 0.8, $img->height() * 0.5); // 20% of image size
        $watermark->resize($watermarkSize, $watermarkSize, function ($constraint) {
            $constraint->aspectRatio();
        });

        // Calculate position for top-right corner
        $x = $img->width() - $watermark->width() - 100; // 100px padding from right edge
        $y = 20; // 20px padding from top edge

        $img->insert($watermark, 'top-left', $x, $y);

        return $img;
    }
}
