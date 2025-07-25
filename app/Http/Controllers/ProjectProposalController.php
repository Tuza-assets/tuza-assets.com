<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectProposal;
use Illuminate\Support\Facades\Storage;

class ProjectProposalController extends Controller
{
    public function index()
    {
        $proposals = ProjectProposal::all();
        return view('project_proposals.index', compact('proposals'));
    }

    public function create()
    {
        return view('project_proposals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'images' => 'required|image', // Ensures it's a valid image
        ]);

        $imageName = null;

        // Handle file upload
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Store in the 'project_proposals' disk root
            Storage::disk('project_proposals')->putFileAs('/', $image, $imageName);
        }

        // Create project proposal
        ProjectProposal::create([
            'title' => $request->title,
            'images' => $imageName, // Save only the filename
        ]);

        return redirect()->route('admin.project.proposal')->with('success', 'Proposal created successfully.');
    }

    public function destroy(ProjectProposal $proposal)
    {
        // Delete the image from storage
        if ($proposal->images) {
            Storage::disk('project_proposals')->delete($proposal->images);
        }

        $proposal->delete();

        return redirect()->route('admin.project.proposal')->with('success', 'Proposal deleted successfully.');
    }
}
