<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zonning;
use Illuminate\Support\Facades\Storage;

class ZonningController extends Controller
{
    public function index()
    {
        $Zonnings = Zonning::all();
        return view('Zonnings.index', compact('Zonnings'));
    }

    public function all_Zonnings()
    {
        $Zonnings = Zonning::all();
        return view('Zonning.all_Zonnings', compact('Zonnings'));
    }

    public function create()
    {
        return view('Zonnings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:20480',
        ]);

        $zonning = new Zonning();
        $zonning->name = $request->input('name');
        $zonning->description = $request->input('description');

        $imageUrls = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                Storage::disk('zone_images')->putFileAs('/', $image, $filename);
                $imageUrls[] = asset('zone_images/' . $filename);
            }
        }

        $zonning->images = json_encode($imageUrls);
        $zonning->save();

        return redirect()->route('admin.Zonning')->with('success', 'Zone created successfully');
    }

    public function show(Zonning $Zonning)
    {
        return view('Zonnings.show', compact('Zonning'));
    }

    public function edit(Zonning $Zonning)
    {
        return view('Zonnings.edit', compact('Zonning'));
    }

    public function update(Request $request, Zonning $Zonning)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:20480',
        ]);

        $data = $request->only(['name', 'description']);

        if ($request->hasFile('images')) {
            // Delete old images
            if ($Zonning->images) {
                $oldImageUrls = json_decode($Zonning->images, true);
                if (is_array($oldImageUrls)) {
                    foreach ($oldImageUrls as $url) {
                        $filename = basename($url);
                        Storage::disk('zone_images')->delete($filename);
                    }
                }
            }

            // Save new images
            $imageUrls = [];
            foreach ($request->file('images') as $image) {
                $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                Storage::disk('zone_images')->putFileAs('/', $image, $filename);
                $imageUrls[] = asset('zone_images/' . $filename);
            }

            $data['images'] = json_encode($imageUrls);
        }

        $Zonning->update($data);

        return redirect()->route('admin.Zonning')->with('success', 'Zonning updated successfully.');
    }

    public function destroy(Zonning $Zonning)
    {
        // Delete associated images
        if ($Zonning->images) {
            $imageUrls = json_decode($Zonning->images, true);
            if (is_array($imageUrls)) {
                foreach ($imageUrls as $url) {
                    $filename = basename($url);
                    Storage::disk('zone_images')->delete($filename);
                }
            }
        }

        $Zonning->delete();

        return redirect()->route('admin.Zonning')->with('success', 'Zonning deleted successfully.');
    }
}
