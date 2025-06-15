<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\BlogCategory;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }
    
    public function all_blogs(){
         $blogs = Blog::all();
        return view('blog.all_blogs', compact('blogs')); 
    }

    public function create()
    {
        return view('blogs.create');
    }

public function store(Request $request)
{
    // Validate the request
    $request->validate([
        'title' => 'required',
        'summary' => 'required',
        'contents' => 'required',
        'status' => 'required|in:draft,published',
        'images' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'category_id' => 'required',
        'Authname' => 'required|string',
    ]);

    // Retrieve all the request data
    $data = $request->all();

    // Handle image upload if it exists
    if ($request->hasFile('images')) {
        $path = $request->file('images')->store('images', 'public');
        $data['images'] = $path;
    }

    // Generate the slug from the title by replacing spaces with underscores
    $slug = str_replace(' ', '-', $data['title']);

    // Create a new Blog entry
    Blog::create([
        'title' => $data['title'],
        'summary' => $data['summary'],
        'contents' => $data['contents'],
        'category_id' => $data['category_id'],
        'Authname' => $data['Authname'],
        'status' => $data['status'],
        'images' => $data['images'] ?? null,
        'slug' => $slug, // Add the generated slug
    ]);

    // Redirect back to the blog index page with a success message
    return redirect()->route('admin.blogs.index')
        ->with('success', 'Blog created successfully.');
}


    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

 public function update(Request $request, $id)
{
    // Validate the request
    $request->validate([
        'title' => 'required',
        'summary' => 'required',
        'contents' => 'required',
        'status' => 'required|in:draft,published',
        'images' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'category_id' => 'required',
        'Authname' => 'required|string',
    ]);

    // Fetch the blog by ID
    $blog = Blog::findOrFail($id); // Find the blog, or fail if not found

    // Retrieve all the request data
    $data = $request->all();

    // Handle the image upload if provided
    if ($request->hasFile('images')) {
        $path = $request->file('images')->store('images', 'public');
        $data['images'] = $path;
    }

    // Generate the slug from the title by replacing spaces with underscores
    $slug = str_replace(' ', '-', $data['title']);

    // Update the blog with the new data
    $blog->update([
        'title' => $data['title'],
        'summary' => $data['summary'],
        'contents' => $data['contents'],
        'category_id' => $data['category_id'],  // Update the category ID
        'Authname' => $data['Authname'],  // Update the author's name
        'status' => $data['status'],
        'images' => $data['images'] ?? $blog->images,  // Update the image if a new one is uploaded, otherwise keep the old one
        'slug' => $slug,  // Regenerate and update the slug
    ]);

    // Redirect back with a success message
    return redirect()->route('admin.blogs.index')
        ->with('success', 'Blog updated successfully.');
}



    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog deleted successfully.');
    }
    
    
        public function storeComment(Request $request, Blog $blog)
        {

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'tel' => 'required|string|max:20',
                'message' => 'required|string',
                'status' => 'nullable|string|in:draft,published',
            ]);
        
            $validated['blog_id'] = $blog->id;
            $validated['status'] = $validated['status'] ?? 'draft'; 
            
            Comment::create($validated);
            return back()->with('success','Comment added successfully!');
        }
        
        
    public function updateStatus(Request $request, Comment $comment)
    {
        $request->validate([
            'status' => 'required|string|in:draft,published',
        ]);

        $comment->status = $request->status;
        $comment->save();
        return back()->with('success', 'Comment status updated successfully!');
    }
    
    
     public function categoriesstore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        BlogCategory::create([
            'name' => $validated['name'],
            'status' => $validated['status'],
        ]);

        return redirect()->back()->with('success', 'Category added successfully!');
    }

}

