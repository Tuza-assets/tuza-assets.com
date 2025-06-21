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
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $zonning = new Zonning();
        $zonning->name = $request->input('name');
        $zonning->description = $request->input('description');

        $imageUrls = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('/', 'zone_images');
                // Generate custom URL format: domain/zone_images/filename
                $fullUrl = url('/zone_images/' . $path);
                $imageUrls[] = $fullUrl;
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
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'description']);

        if ($request->hasFile('images')) {
            // Delete old images
            if ($Zonning->images) {
                $oldImageUrls = json_decode($Zonning->images, true);
                foreach ($oldImageUrls as $oldImageUrl) {
                    // Extract the path from the full URL for deletion
                    $relativePath = $this->extractPathFromUrl($oldImageUrl);
                    if ($relativePath && Storage::disk('zone_images')->exists($relativePath)) {
                        Storage::disk('zone_images')->delete($relativePath);
                    }
                }
            }

            // Store new images
            $imageUrls = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('/', 'zone_images');
                // Generate custom URL format: domain/zone_images/filename
                $fullUrl = url('/zone_images/' . $path);
                $imageUrls[] = $fullUrl;
            }
            $data['images'] = json_encode($imageUrls);
        }

        $Zonning->update($data);

        return redirect()->route('admin.Zonning')
            ->with('success', 'Zonning updated successfully.');
    }

    public function destroy(Zonning $Zonning)
    {
        // Delete associated images
        if ($Zonning->images) {
            $imageUrls = json_decode($Zonning->images, true);
            foreach ($imageUrls as $imageUrl) {
                // Extract the path from the full URL for deletion
                $relativePath = $this->extractPathFromUrl($imageUrl);
                if ($relativePath && Storage::disk('zone_images')->exists($relativePath)) {
                    Storage::disk('zone_images')->delete($relativePath);
                }
            }
        }

        $Zonning->delete();
        return redirect()->route('admin.Zonning')
            ->with('success', 'Zonning deleted successfully.');
    }

    /**
     * Extract relative path from full URL for file operations
     */
    private function extractPathFromUrl($url)
    {
        // Extract filename from URL like: http://127.0.0.1:5000/zone_images/filename.jpg
        $urlParts = parse_url($url);
        $path = $urlParts['path'];

        // Remove '/zone_images/' prefix to get just the filename
        if (strpos($path, '/zone_images/') === 0) {
            return substr($path, strlen('/zone_images/'));
        }

        // Fallback: extract filename
        return basename($url);
    }
}
