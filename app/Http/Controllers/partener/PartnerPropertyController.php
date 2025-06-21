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
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string|in:residential,commercial,land',
            'property_type' => 'required',
            'country' => 'required|string',
            'province' => 'required|string',
            'district' => 'required|string',
            'sector' => 'required|string',
            'cell' => 'required|string',
            'village' => 'required|string',
            'map_link' => 'nullable|url',
            'size' => 'required|numeric',
            'floor' => 'required|integer',
            'room' => 'required|integer',
            'bedrooms' => 'required|integer',
            'bathroom' => 'required|integer',
            'kitchen' => 'required|integer',
            'dining_room' => 'required|integer',
            'year_of_construction' => 'required|integer',
            'price' => 'required|numeric',
            'currency' => 'required|string|in:RWF,USD,EUR',
            'availability' => 'required|string|in:available,rented,sold',
            'construction_type' => 'required|string|in:concrete,wood,steel,mixed',
            'amenities' => 'nullable|array',
            'amenities.*' => 'string|in:central_heating_boiler,bathtub,renewable_energy,fireplace,swimming_pool,roof_top,cinema,gym',
            'mainimage' => 'nullable|image|max:20480',
            'images' => 'nullable|array',
            'images.*' => 'image|max:20480',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['status'] = 'Under Offer';
        $year = date('Y');
        $countThisYear = PropertyOnSell::whereYear('created_at', $year)->count() + 1;
        $serial = str_pad($countThisYear, 3, '0', STR_PAD_LEFT);
        $random = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3));
        $identity = "{$year}_{$serial}_{$random}";
        $data['property_code'] = $identity;

        $publicPath = public_path('property_images');
        if (!File::exists($publicPath)) {
            File::makeDirectory($publicPath, 0755, true);
        }

        // Handle main image
        if ($request->hasFile('mainimage')) {
            $image = $request->file('mainimage');
            $newImageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $img = $this->applyWatermark($image);

            // Save image directly to public/property_images folder
            $imagePath = $publicPath . '/' . $newImageName;
            $img->save($imagePath, 90);
            $data['mainimage'] = 'property_images/' . $newImageName;
        }

        // Handle additional images
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $newImageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $img = $this->applyWatermark($image);

                // Save image directly to public/property_images folder
                $imagePath = $publicPath . '/' . $newImageName;
                $img->save($imagePath, 90);
                $imagePaths[] = 'property_images/' . $newImageName;
            }
            $data['images'] = json_encode($imagePaths);
        }

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
            'type' => 'required|string|in:residential,commercial,land',
            'property_type' => 'required',
            'country' => 'required|string',
            'province' => 'required|string',
            'district' => 'required|string',
            'sector' => 'required|string',
            'cell' => 'required|string',
            'village' => 'required|string',
            'map_link' => 'nullable|url',
            'size' => 'required|numeric',
            'floor' => 'required|integer',
            'room' => 'required|integer',
            'bedrooms' => 'required|integer',
            'bathroom' => 'required|integer',
            'kitchen' => 'required|integer',
            'dining_room' => 'required|integer',
            'year_of_construction' => 'required|integer',
            'price' => 'required|numeric',
            'currency' => 'required|string|in:RWF,USD,EUR',
            'availability' => 'required|string|in:available,rented,sold',
            'construction_type' => 'required|string|in:concrete,wood,steel,mixed',
            'amenities' => 'nullable|array',
            'amenities.*' => 'string|in:central_heating_boiler,bathtub,renewable_energy,fireplace,swimming_pool,roof_top,cinema,gym',
            'mainimage' => 'nullable|image|max:20480',
            'images' => 'nullable|array',
            'images.*' => 'image|max:20480',
        ]);

        $data = $request->all();

                // Ensure property_images directory exists in public folder
        $publicPath = public_path('property_images');
        if (!File::exists($publicPath)) {
            File::makeDirectory($publicPath, 0755, true);
        }

        // Handle main image
        if ($request->hasFile('mainimage')) {
            // Delete old main image if exists
            if ($property->mainimage) {
                $oldImagePath = public_path($property->mainimage);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            $image = $request->file('mainimage');
            $newImageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $img = $this->applyWatermark($image);

            // Save image directly to public/property_images folder
            $imagePath = $publicPath . '/' . $newImageName;
            $img->save($imagePath, 90);
            $data['mainimage'] = 'property_images/' . $newImageName;
        }

        // Handle additional images
        if ($request->hasFile('images')) {
            // Delete old images if they exist
            if ($property->images) {
                $oldImages = json_decode($property->images, true);
                if (is_array($oldImages)) {
                    foreach ($oldImages as $oldImage) {
                        $oldImagePath = public_path($oldImage);
                        if (File::exists($oldImagePath)) {
                            File::delete($oldImagePath);
                        }
                    }
                }
            }

            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $newImageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $img = $this->applyWatermark($image);

                // Save image directly to public/property_images folder
                $imagePath = $publicPath . '/' . $newImageName;
                $img->save($imagePath, 90);
                $imagePaths[] = 'property_images/' . $newImageName;
            }
            $data['images'] = json_encode($imagePaths);
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
        $x = $img->width() - $watermark->width() - 20; // 20px padding from right edge
        $y = 20; // 20px padding from top edge

        $img->insert($watermark, 'top-left', $x, $y);

        return $img;
    }
}
