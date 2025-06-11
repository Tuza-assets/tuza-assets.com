@extends('layouts.web')

<style>
    .post-category {
        background-color: green;
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

    .share-buttons {
        margin-top: 20px;
    }

    .share-buttons button {
        margin-right: 10px;
    }

    input:focus, textarea:focus {
        outline: none !important;
        box-shadow: none !important;
        border-color: green !important;
    }

    input.active, textarea.active {
        text-decoration: none !important;
    }

    /* New styles for responsive content */
    .blog-content {
        overflow-wrap: break-word;
        word-wrap: break-word;
    }

    .blog-content img {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 1em auto;
    }

    .blog-content iframe {
        max-width: 100%;
        margin: 1em auto;
    }

    .video-container {
        position: relative;
        padding-bottom: 56.25%; /* 16:9 aspect ratio */
        height: 0;
        overflow: hidden;
        margin: 1em auto;
    }

    .video-container iframe,
    .video-container object,
    .video-container embed {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    @media (max-width: 768px) {
        .col-md-8, .col-md-4 {
            padding: 0 15px;
        }
        
        .hero .display-4{
            margin-top: 20vh;
        }
        
    }
</style>

@section('content')
<section class="hero text-white text-center py-5">
    <div class="container">
        <h1 class="display-4">TUZA ASSETS Ltd</h1>
        <p class="lead">Blog</p>
    </div>
</section>

<section id="blog-container">
    <div class="container">
        <div class="row">
            <!-- Main Content Area -->
            <div class="col-md-8">
                <div class="border border-warning">
                    @if (!empty($blog->images))
                        <img src="{{ asset('public/storage/' . $blog->images) }}" class="img-fluid" alt="Post Image">
                    @endif
                    <div class="card-body">
                        <div class="post-meta">
                            <span>{{ $blog->Authname ?? 'TUZA ASSETS' }}</span> |
                            <span>{{ \Carbon\Carbon::parse($blog->published_at)->format('m-d-Y') }}</span> |
                            <span class="post-category">{{ $blog->categories->name}}</span>
                        </div>
                        <h5 class="card-title">{{ $blog->title }}</h5>
                        <p class="card-text">{{ $blog->summary }}</p>
                        <div class="blog-content">
                            {!! $blog->contents !!}
                        </div>
                        <div class="share-buttons">
                            <button onclick="shareWhatsApp()" class="btn btn-success btn-sm m-1">
                                <i class="fab fa-whatsapp"></i>
                            </button>
                            <button onclick="shareLinkedIn()" class="btn btn-success btn-sm">
                                <i class="fab fa-linkedin"></i>
                            </button>
                            <button onclick="copyLink()" class="btn btn-success btn-sm m-1">
                                <i class="fas fa-link"></i> Copy Link
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <h5 class="py-4">Add comment</h5>
                    <form method="POST" action="{{ route('blogs.comments.store', $blog) }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="tel" class="form-label">Tel</label>
                            <input type="tel" class="form-control" name="tel" id="tel" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success btn-block">Send</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-md-4 pl-5">
                <div class="sidebar">
                    <h5>Blog Category</h5>
                    <div class="list-group mb-4">
                        @php
                            use App\Models\Blog;
                            $blogs = Blog::orderBy('created_at', 'desc')->take(4)->get();
                            $categories = [];
                        @endphp
                        @foreach ($blogs as $blogItem)
                            @if (!in_array($blogItem->category, $categories))
                                <a href="#" class="list-group-item list-group-item-action">{{ $blogItem->categories->name}}</a>
                                @php
                                    $categories[] = $blogItem->categories->name;
                                @endphp
                            @endif
                        @endforeach
                    </div>

                    <h5>Recent Posts</h5>
                    <div class="list-group">
                        @foreach ($blogs as $blogItem)
                            <a href="{{ route('blogdetail', $blogItem->slug) }}" class="list-group-item recent-post">
                                @if (!empty($blogItem->images))
                                    <img src="{{ asset('public/storage/' . $blogItem->images) }}" alt="Post Image">
                                @endif
                                <div>
                                    <p class="mt-2 mb-0 text-success">{{ Str::limit($blogItem->title, 20) }}</p>
                                    <small class="text-success">{{ \Carbon\Carbon::parse($blogItem->created_at)->format('m-d-Y') }}</small>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <div class="sidebar mt-4">
                        <h5>Comments</h5>
                        @php
                          $publishedComments = \App\Models\Comment::where('blog_id', $blog->id)
                            ->where('status', 'published')
                            ->inRandomOrder() 
                            ->limit(5)        
                            ->get();
                        @endphp
                        @if ($publishedComments->isEmpty())
                            <p>No comments yet.</p>
                        @else
                            @foreach($publishedComments as $comment)
                                <div class="comment">
                                    <p><strong>{{ $comment->name }}</strong> ({{ $comment->email }})</p>
                                    <p>{{ $comment->message }}</p>
                                </div>
                                <hr>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function shareWhatsApp() {
        const url = window.location.href;
        const text = "Check out this post: ";
        window.open(`https://api.whatsapp.com/send?text=${encodeURIComponent(text + url)}`);
    }

    function shareLinkedIn() {
        const url = window.location.href;
        window.open(`https://www.linkedin.com/shareArticle?mini=true&url=${encodeURIComponent(url)}`);
    }

    function copyLink() {
        const url = window.location.href;
        navigator.clipboard.writeText(url).then(() => {
            alert('Link copied to clipboard!');
        }, (err) => {
            console.error('Could not copy text: ', err);
        });
    }

    // New script for responsive iframes
    document.addEventListener('DOMContentLoaded', function() {
        const blogContent = document.querySelector('.blog-content');
        if (blogContent) {
            const iframes = blogContent.getElementsByTagName('iframe');
            for (let i = 0; i < iframes.length; i++) {
                const iframe = iframes[i];
                const wrapper = document.createElement('div');
                wrapper.classList.add('video-container');
                iframe.parentNode.insertBefore(wrapper, iframe);
                wrapper.appendChild(iframe);
            }
        }
    });
</script>
@endsection