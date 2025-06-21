@extends('layouts.dashboard.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="mb-4 text-2xl font-bold">Blogs</h1>
        <a href="{{ route('blogs.create') }}" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Create Blog</a>
        <table class="mt-4 w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Summary</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                <tr>
                    <td class="px-4 py-2 border">{{ $blog->title }}</td>
                    <td class="px-4 py-2 border">{{ $blog->summary }}</td>
                    <td class="px-4 py-2 border">{{ $blog->status }}</td>
                    <td class="px-4 py-2 border">
                        <a href="{{ route('blogs.show', $blog->id) }}" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">View</a>
                        <a href="{{ route('blogs.edit', $blog->id) }}" class="px-4 py-2 font-bold text-white bg-yellow-500 rounded hover:bg-yellow-700">Edit</a>
                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-700">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
