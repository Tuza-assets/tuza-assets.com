<?php

namespace App\Http\Controllers\partener;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyOnSell;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class PartnerPropertyController extends Controller
{
    public function index()
    {
        $properties = PropertyOnSell::where('user_id', Auth::id())->latest()->paginate(10);
        return view('partner.property.index', compact('properties'));
    }

    public function create()
    {
        return view('partner.property.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string',
            'property_type' => 'nullable|string',
            'house_type' => 'nullable|string',
            'country' => 'required|string',
            'province' => 'required|string',
            'district' => 'required|string',
            'sector' => 'required|string',
            'cell' => 'required|string',
            'village' => 'required|string',
            'map_link' => 'nullable|string',
            'size' => 'nullable|numeric',
            'floor' => 'nullable|integer',
            'room' => 'nullable|integer',
            'bedrooms' => 'nullable|integer',
            'bathroom' => 'nullable|integer',
            'kitchen' => 'nullable|integer',
            'dining_room' => 'nullable|integer',
            'year_of_construction' => 'nullable|integer',
            'price' => 'required|numeric',
            'currency' => 'required|string|in:RWF,USD,EUR',
            'availability' => 'required|string',
            'construction_type' => 'nullable|string',
            'amenities' => 'nullable|array',
            'amenities.*' => 'nullable|string',
            'mainimage' => 'nullable|image|max:20480',
            'images' => 'nullable|array',
            'images.*' => 'image|max:20480',
        ]);

        $data = $request->all();
        // dd($data);
        $data['user_id'] = Auth::id();
        $data['status'] = 'Under Offer';
        $year = date('Y');
        $countThisYear = PropertyOnSell::whereYear('created_at', $year)->count() + 1;
        $serial = str_pad($countThisYear, 3, '0', STR_PAD_LEFT);
        $random = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3));
        $identity = "{$year}_{$serial}_{$random}";
        $data['property_code'] = $identity;
        // Handle main image
        if ($request->hasFile('mainimage')) {
            $photo = $request->file('mainimage');
            $filename = uniqid() . '.' . $photo->getClientOriginalExtension();
            $image = $this->applyWatermark($photo);
            Storage::disk('property_images')->put($filename, (string) $image->encode());
            $data['mainimage'] = 'property_images/' . $filename;
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
            $data['images'] = json_encode($images);
        }

        // dd($data);

        PropertyOnSell::create($data);

        return redirect()->route('partner.properties.index')->with('success', 'Property created successfully.');
    }

    public function show(PropertyOnSell $property)
    {
        $property = PropertyOnSell::find($property->id);
        return view('partner.property.show', compact('property'));
    }

    public function edit(PropertyOnSell $property)
    {
        $property = PropertyOnSell::find($property->id);
        return view('partner.property.edit', compact('property'));
    }

    public function update(Request $request, PropertyOnSell $property)
    {
        $property = PropertyOnSell::find($property->id);
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string',
            'property_type' => 'nullable|string',
            'house_type' => 'nullable|string',
            'country' => 'required|string',
            'province' => 'required|string',
            'district' => 'required|string',
            'sector' => 'required|string',
            'cell' => 'required|string',
            'village' => 'required|string',
            'map_link' => 'nullable|string',
            'size' => 'nullable|numeric',
            'floor' => 'nullable|integer',
            'room' => 'nullable|integer',
            'bedrooms' => 'nullable|integer',
            'bathroom' => 'nullable|integer',
            'kitchen' => 'nullable|integer',
            'dining_room' => 'nullable|integer',
            'year_of_construction' => 'nullable|integer',
            'price' => 'required|numeric',
            'currency' => 'required|string|in:RWF,USD,EUR',
            'availability' => 'required|string',
            'construction_type' => 'nullable|string',
            'amenities' => 'nullable|array',
            'amenities.*' => 'nullable|string',
            'mainimage' => 'nullable|image|max:20480',
            'images' => 'nullable|array',
            'images.*' => 'image|max:20480',
        ]);

        $data = $request->all();

        if ($request->hasFile('mainimage')) {
            if ($property->mainimage) {
                Storage::disk('property_images')->delete(basename($property->mainimage));
            }
            $image = $this->applyWatermark($request->file('mainimage'));
            $filename = uniqid() . '.' . $request->file('mainimage')->getClientOriginalExtension();
            Storage::disk('property_images')->put($filename, (string) $image->encode());
            $data['mainimage'] = 'property_images/' . $filename;
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
            $data['images'] = json_encode($images);
        }

        $property->update($data);

        return redirect()->route('partner.properties.index')->with('success', 'Property updated successfully.');
    }

    public function destroy(PropertyOnSell $property)
    {
        $property = PropertyOnSell::find($property->id);

        // Delete main image if exists
        if ($property->mainimage && Storage::disk('property_images')->exists(basename($property->mainimage))) {
            Storage::disk('property_images')->delete(basename($property->mainimage));
        }

        // Delete additional images if they exist
        if ($property->images) {
            $images = json_decode($property->images, true);
            foreach ($images as $image) {
                $fileName = basename($image);
                if (Storage::disk('property_images')->exists($fileName)) {
                    Storage::disk('property_images')->delete($fileName);
                }
            }
        }

        $property->delete();

        return redirect()->route('partner.properties.index')->with('success', 'Property deleted successfully.');
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
