@extends('layouts.dashboard.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Blogs</h1>
        <a href="{{ route('blogs.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Blog</a>
        <table class="table-auto w-full mt-4">
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
                    <td class="border px-4 py-2">{{ $blog->title }}</td>
                    <td class="border px-4 py-2">{{ $blog->summary }}</td>
                    <td class="border px-4 py-2">{{ $blog->status }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('blogs.show', $blog->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">View</a>
                        <a href="{{ route('blogs.edit', $blog->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
