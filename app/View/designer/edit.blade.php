<x-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <div class="max-w-6xl mx-auto px-4 py-8">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <h1 class="text-2xl font-bold mb-6">Edit Design</h1>
                    <form action="{{ route('designs.update', $design->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')
                        <div>
                            <label class="block text-gray-700">Title</label>
                            <input type="text" name="title" value="{{ old('title', $design->title) }}" class="w-full border p-2 rounded" required>
                        </div>
                        <div>
                            <label class="block text-gray-700">Description</label>
                            <textarea name="description" class="w-full border p-2 rounded" required>{{ old('description', $design->description) }}</textarea>
                        </div>
                        <div>
                            <label class="block text-gray-700">Price</label>
                            <input type="text" name="price" value="{{ old('price', $design->price) }}" class="w-full border p-2 rounded" required>
                        </div>
                        <div>
                            <label class="block text-gray-700">Main Image</label>
                            <input type="file" name="main_image" class="w-full border p-2 rounded">
                            @if ($design->main_image)
                                <img src="{{ asset('storage/' . $design->main_image) }}" alt="{{ $design->title }}" class="w-32 mt-4">
                            @endif
                        </div>
                        <div>
                            <label class="block text-gray-700">Additional Images</label>
                            <input type="file" name="images[]" class="w-full border p-2 rounded" multiple>
                            @if (!empty($design->images))
                                @foreach ($design->images as $image)
                                    <img src="{{ asset('storage/' . $image) }}" alt="{{ $design->title }}" class="w-32 mt-4">
                                @endforeach
                            @endif
                        </div>
                        <div>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
