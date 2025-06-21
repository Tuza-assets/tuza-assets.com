<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Storage;

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
        $categories = BlogCategory::where('status', 1)->get();
        return view('blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'contents' => 'required|string',
            'status' => 'required|in:draft,published',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:blog_categories,id',
            'Authname' => 'required|string|max:255',
        ]);

        // Handle image upload if it exists
        $imagePath = null;
        if ($request->hasFile('images')) {
            $imagePath = $request->file('images')->store('/', 'blog_images');
        }

        // Generate the slug from the title
        $slug = $this->generateUniqueSlug($request->title);

        // Create a new Blog entry
        Blog::create([
            'title' => $request->title,
            'summary' => $request->summary,
            'contents' => $request->contents,
            'category_id' => $request->category_id,
            'Authname' => $request->Authname,
            'status' => $request->status,
            'images' => $imagePath,
            'slug' => $slug,
        ]);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog created successfully.');
    }

    public function show(Blog $blog)
    {
        // Add image URL for display - using direct URL without /storage/
        $blog->image_url = $blog->images ? url('blog_images/' . $blog->images) : null;
        return view('blogs.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        $categories = BlogCategory::where('status', 1)->get();
        return view('blogs.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'contents' => 'required|string',
            'status' => 'required|in:draft,published',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:blog_categories,id',
            'Authname' => 'required|string|max:255',
        ]);

        // Fetch the blog by ID
        $blog = Blog::findOrFail($id);

        // Handle the image upload if provided
        $imagePath = $blog->images; // Keep existing image by default
        if ($request->hasFile('images')) {
            // Delete old image if it exists
            if ($blog->images) {
                Storage::disk('blog_images')->delete($blog->images);
            }
            // Store new image
            $imagePath = $request->file('images')->store('/', 'blog_images');
        }

        // Generate the slug from the title (only if title changed)
        $slug = $blog->slug;
        if ($blog->title !== $request->title) {
            $slug = $this->generateUniqueSlug($request->title, $id);
        }

        // Update the blog with the new data
        $blog->update([
            'title' => $request->title,
            'summary' => $request->summary,
            'contents' => $request->contents,
            'category_id' => $request->category_id,
            'Authname' => $request->Authname,
            'status' => $request->status,
            'images' => $imagePath,
            'slug' => $slug,
        ]);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        // Delete associated image if it exists
        if ($blog->images) {
            Storage::disk('blog_images')->delete($blog->images);
        }

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

    /**
     * Generate a unique slug for the blog
     */
    private function generateUniqueSlug($title, $excludeId = null)
    {
        $baseSlug = str_replace(' ', '-', strtolower(trim($title)));
        $baseSlug = preg_replace('/[^a-z0-9\-]/', '', $baseSlug);
        $baseSlug = preg_replace('/-+/', '-', $baseSlug);

        $slug = $baseSlug;
        $counter = 1;

        while (true) {
            $query = Blog::where('slug', $slug);
            if ($excludeId) {
                $query->where('id', '!=', $excludeId);
            }

            if (!$query->exists()) {
                break;
            }

            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}