<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ProjectProposal;

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
            'images' => 'required', // Example validation for image upload
        ]);

        // Handle file upload
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName); // Store the image in storage/app/public/images
        }

        // Create project proposal
        ProjectProposal::create([
            'title' => $request->title,
            'images' => $imageName, // Store the image name or path in the database
        ]);

        return redirect()->route('admin.project.proposal')->with('success', 'Proposal created successfully.');
    }


    public function destroy(ProjectProposal $proposal)
    {
        $proposal->delete();
        
        return redirect()->route('admin.project.proposal')->with('success', 'Proposal deleted successfully.');
    }
}
