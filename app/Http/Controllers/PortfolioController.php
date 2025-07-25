<?php

// app/Http/Controllers/PortfolioController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
  public function index()
    {
        $portfolios = Portfolio::all();
        return view('portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        return view('portfolios.create');
    }

     public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required', // Example validation for image upload
        ]);

        $imageName = null;
        // Handle file upload
        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Store in the 'project_proposals' disk root
            Storage::disk('project_proposals')->putFileAs('/', $image, $imageName);
        }

        // Create project proposal
        Portfolio::create([
            'title' => $request->title,
            'image' => $imageName, // Store the image name or path in the database
        ]);

        return redirect()->route('admin.portfolios.index')->with('success', 'Proposal created successfully.');
    }

    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $portfolio->delete();

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio deleted successfully.');
    }
}
