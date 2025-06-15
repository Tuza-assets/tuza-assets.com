<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zonning;

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
        'images.*' => 'image',
    ]);

    $zonning = new Zonning();
    $zonning->name = $request->input('name');
    $zonning->description = $request->input('description');

    $images = [];
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('zones', 'public');
            $images[] = url('public/storage/' . $path); // Store full URL
        }
    }

    $zonning->images = json_encode($images);
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
            'name' => 'required',
            'description' => 'required',
            'images.*' => 'image',
        ]);
    
        $data = $request->all();
    
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                $imagePaths[] = url('public/storage/' . $path); // Store full URL
            }
            $data['images'] = json_encode($imagePaths);
        }
    
        $Zonning->update($data);
    
        return redirect()->route('admin.Zonning')
            ->with('success', 'Zonning updated successfully.');
    }

    public function destroy(Zonning $Zonning)
    {
        $Zonning->delete();
        return redirect()->route('admin.Zonning')
            ->with('success', 'Zonning deleted successfully.');
    }
}


