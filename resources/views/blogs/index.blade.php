@extends('layouts.dashboard.app')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="mt-14 rounded-lg border-gray-200 dark:border-gray-700">
            <div class="p-3 bg-white rounded border shadow-md col-lg-12">
                <h1 class="mb-4 text-2xl font-bold">Blogs</h1>
                <a href="{{ route('admin.blogs.create') }}"
                    class="px-4 py-2 font-bold text-white bg-green-500 rounded hover:bg-green-700">Create Blog</a>
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
                                <td class="gap-2 px-4 py-2 border d-flex">
                                    <a href="{{ route('admin.blogs.show', $blog->id) }}"
                                        class="px-4 py-2 h-1/2 font-bold text-white bg-green-500 rounded hover:bg-green-700">View</a>
                                    <a href="{{ route('admin.blogs.edit', $blog->id) }}"
                                        class="px-4 py-2 h-1/2 font-bold text-white bg-orange-500 rounded hover:bg-orange-700">Edit</a>
                                    <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-4 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-700">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
