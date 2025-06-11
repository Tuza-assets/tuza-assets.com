@extends('layouts.dashboard.app')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    .post-category {
        background-color: #17a2b8;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        display: inline-block;
    }
    .post-meta {
        margin-bottom: 20px;
    }
    .recent-post img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        margin-right: 15px;
    }
    .sidebar .list-group-item {
        border: none;
        padding-left: 0;
        display: flex;
        align-items: center;
    }
    .sidebar .list-group-item:hover {
        background-color: transparent;
    }
</style>

@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Main Content Area -->
        <div class="col-md-8">
            <div class="card mb-4">
                @if(!empty($blog->images))
                <img src="{{ asset('public/storage/' . $blog->images) }}" class="card-img-top" alt="Post Image">
                @endif
                <div class="card-body">
                    <div class="post-meta">
                        <span>{{ $blog->author ?? 'Admin' }}</span> |
                        <span>{{ \Carbon\Carbon::parse($blog->published_at)->format('m-d-Y') }}</span> |
                        <span class="post-category">{{ $blog->category }}</span>
                    </div>
                    <h5 class="card-title">{{ $blog->title }}</h5>
                    <p class="card-text">{{ $blog->summary }}</p>
                    <p class="card-text">{!! $blog->contents !!}</p>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-md-4">
            <div class="sidebar">
                <h5>Comments</h5>
                @php
                    // Fetch comments for the specific blog
                    $comments = \App\Models\Comment::where('blog_id', $blog->id)->get();
                @endphp
                @if ($comments->isEmpty())
                    <p>No comments yet.</p>
                @else
                    @foreach($comments as $comment)
                        <div class="comment">
                            <p><strong>{{ $comment->name }}</strong> ({{ $comment->email }})</p>
                            <p>{{ $comment->message }}</p>
                            <p>Status: {{ ucfirst($comment->status) }}</p>
                            <form method="POST" action="{{ route('comments.updateStatus', $comment->id) }}">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <select name="status" class="form-control" onchange="this.form.submit()">
                                        <option value="draft" {{ $comment->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                        <option value="published" {{ $comment->status == 'published' ? 'selected' : '' }}>Published</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <hr>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
