<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyOnSell;
use App\Models\Favority;
use Str;
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
            'mainimages' => 'nullable|image',
             'type' => 'nullable|string',
            'country' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'sector' => 'required|string|max:255',
            'cell' => 'required|string|max:255',
            'village' => 'required|string|max:255',
            'house' => 'nullable|string|max:255',
            'map_link' => 'nullable|string',
            'images.*' => 'nullable|image',
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
            'year_of_construction' => 'nullable',
            
        ]);
        
        
        $year = date('Y');
        $countThisYear = PropertyOnSell::whereYear('created_at', $year)->count() + 1;
        $serial = str_pad($countThisYear, 3, '0', STR_PAD_LEFT);
        $random = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3));
        $identity = "{$year}_{$serial}_{$random}";
        $validatedData['property_code']=$identity;
        
        if ($request->hasFile('mainimages')) {
            $image = $request->file('mainimages');
            $newImageName = uniqid() . '.' . $image->getClientOriginalExtension();
    
            $img = $this->applyWatermark($image); 
            $img->save(public_path('storage/property_images/' . $newImageName));
    
            $validatedData['mainimages'] = 'storage/property_images/' . $newImageName;
        }
        
        // dd($validatedData);
        
         if ($request->hasFile('images')) {
                $imagePaths = [];
                foreach ($request->file('images') as $image) {
                    $newImageName = uniqid() . '.' . $image->getClientOriginalExtension();
                    $img = $this->applyWatermark($image);
                    $img->save(public_path('storage/property_images/' . $newImageName));
        
                    $imagePaths[] = 'storage/property_images/' . $newImageName;
                }
                $validatedData['images'] = json_encode($imagePaths);
            } else {
                // Retain existing images if no new ones are uploaded
                $validatedData['images'] = $property->images;
            }
            
        $property = PropertyOnSell::create($validatedData);
    
         return redirect()->route('admin.properties.index', $property->id)->with('success', 'Property created successfully.');
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
        // dd($request);
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
            'images.*' => 'nullable|image',
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
            'year_of_construction' => 'nullable',
             'mainimages' => 'nullable|image',
        ]);
        
                
        if ($request->hasFile('mainimages')) {
            $image = $request->file('mainimages');
            $newImageName = uniqid() . '.' . $image->getClientOriginalExtension();
    
            $img = $this->applyWatermark($image); 
            $img->save(public_path('storage/property_images/' . $newImageName));
    
            $validatedData['mainimages'] = 'storage/property_images/' . $newImageName;
        }
        
 if ($request->hasFile('images')) {
        $imagePaths = [];
        foreach ($request->file('images') as $image) {
            $newImageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $img = $this->applyWatermark($image);
            $img->save(public_path('storage/property_images/' . $newImageName));

            $imagePaths[] = 'storage/property_images/' . $newImageName;
        }
        $validatedData['images'] = json_encode($imagePaths);
    } else {
        // Retain existing images if no new ones are uploaded
        $validatedData['images'] = $property->images;
    }
    
    // dd($validatedData);

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
        $favority = Favority::where('product_id', $propertyId)
            ->where('email', $email)
            ->first();
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
    // Find the property by ID
    $property = PropertyOnSell::findOrFail($id);

    // If there are images associated with the property, delete them from storage
    if ($property->images) {
        $images = json_decode($property->images, true);
        foreach ($images as $image) {
            if (file_exists(public_path($image))) {
                unlink(public_path($image));
            }
        }
    }

    // Delete the property from the database
    $property->delete();

    // Redirect back with a success message
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
    $x = $img->width() - $watermark->width() - 20; // 20px padding from right edge
    $y = 20; // 20px padding from top edge
    
    $img->insert($watermark, 'top-left', $x, $y);
    
    return $img;
}



}
