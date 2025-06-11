<?php

namespace App\Http\Controllers\Design;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Design;
use Illuminate\Support\Facades\Log;

class DesignController extends Controller
{
    public function index()
    {
        $designs = Design::all();
        return view('designer.index', compact('designs'));
    }

    public function create()
    {
        return view('designer.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'package_includes' => 'required',
        'price' => 'required',
        'currency' => 'required',
        'main_image' => 'nullable|image',
        'images.*' => 'nullable|image',
    ]);

    $mainImagePath = $request->file('main_image') ? $request->file('main_image')->store('designs') : null;
    $additionalImages = [];

    if ($request->file('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('designs');
            Log::info('Stored image path: ' . $path);
            $additionalImages[] = $path;
        }
    }

    Design::create([
        'name' => $request->name,
        'package_includes' => $request->package_includes,
        'price' => $request->price,
        'currency' => $request->currency,
        'main_image' => $mainImagePath,
        'images' => $additionalImages,
        'zone' => $request->zone,
        'size' => $request->size,
        'dimensions' => $request->dimensions,
        'number_of_rooms' => $request->number_of_rooms,
        'additional_information' => $request->additional_information,
    ]);

    return redirect()->route('design.index')->with('success', 'Design created successfully.');
}

    public function show($id)
    {
        $design = Design::findOrFail($id);
        return view('designer.show', compact('design'));
    }

    public function edit(Design $design)
    {
        return view('designer.edit', compact('design'));
    }

    public function update(Request $request, Design $design)
    {
        $request->validate([
            'name' => 'required',
            'package_includes' => 'required',
            'price' => 'required|numeric',
            'main_image' => 'nullable',
            'images.*' => 'nullable',
        ]);

        if ($request->file('main_image')) {
            if ($design->main_image) {
                Storage::delete($design->main_image);
            }
            $mainImagePath = $request->file('main_image')->store('designs');
        } else {
            $mainImagePath = $design->main_image;
        }

        $additionalImages = $design->images;

        if ($request->file('images')) {
            foreach ($request->file('images') as $image) {
                $additionalImages[] = $image->store('designs');
            }
        }

        $design->update([
            'name' => $request->name,
            'package_includes' => $request->package_includes,
            'price' => $request->price,
            'main_image' => $mainImagePath,
            'images' => $additionalImages,
            'zone' => $request->zone,
            'size' => $request->size,
            'dimensions' => $request->dimensions,
            'number_of_rooms' => $request->number_of_rooms,  // New field
            'additional_information' => $request->additional_information,  // New field
        ]);

        return redirect()->route('design.index')->with('success', 'Design updated successfully.');
    }

    public function destroy(Design $design)
    {
        if ($design->main_image) {
            Storage::delete($design->main_image);
        }

        if (is_array($design->images) && !empty($design->images)) {
            foreach ($design->images as $image) {
                Storage::delete($image);
            }
        }

        $design->delete();

        return redirect()->route('design.index')->with('success', 'Design deleted successfully.');
    }
}
