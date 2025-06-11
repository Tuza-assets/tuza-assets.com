<x-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <div class="container mx-auto">
                <h1 class="text-2xl font-bold mb-6">Create New Design</h1>
                <form action="{{ route('designs.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @csrf
                    <!-- Name Field -->
                    <div class="md:col-span-1">
                        <label class="block text-gray-700">Name</label>
                        <input type="text" name="name" class="w-full border p-2 rounded" required>
                    </div>
                    
                    <!-- Price Field -->
                    <div class="md:col-span-1">
                        <label class="block text-gray-700">Price</label>
                        <input type="text" name="price" class="w-full border p-2 rounded" required>
                    </div>

                    <!-- Description (Package Includes) Field -->
                    <div class="md:col-span-2">
                        <label class="block text-gray-700">Package Includes</label>
                        <textarea name="package_includes" class="w-full border p-2 rounded" required></textarea>
                    </div>

                    <!-- Zone Field -->
                    <div class="md:col-span-1">
                        <label class="block text-gray-700">Zone</label>
                        <input type="text" name="zone" class="w-full border p-2 rounded">
                    </div>

                    <!-- Size Field -->
                    <div class="md:col-span-1">
                        <label class="block text-gray-700">Size</label>
                        <input type="text" name="size" class="w-full border p-2 rounded">
                    </div>

                    <!-- Dimensions Field -->
                    <div class="md:col-span-1">
                        <label class="block text-gray-700">Dimensions</label>
                        <input type="text" name="dimensions" class="w-full border p-2 rounded">
                    </div>

                    <!-- Main Image Field -->
                    <div class="md:col-span-1 relative">
                        <label class="block text-gray-700">Main Image</label>
                        <div class="relative py-5">
                            <input type="file" name="main_image" onchange="previewImage(event, 'main_image_preview')" style="height: 100%; width: 100%;">
                            <div class="w-full h-32 border p-2 rounded flex items-center justify-center bg-cover bg-center" id="main_image_preview_container">
                                <img id="main_image_preview" class="w-16 h-16 rounded hidden">
                            </div>
                        </div>
                    </div>

                    <!-- Additional Images Field -->
                    <div class="md:col-span-1 relative">
                        <label class="block text-gray-700">Additional Images</label>
                        <div class="relative py-5">
                            <input type="file" name="images[]" multiple onchange="previewImages(event)">
                            <div class="w-full h-32 border p-2 rounded flex items-center justify-center bg-cover bg-center" id="additional_images_preview_container">
                                <div id="additional_images_preview" class="flex space-x-2"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="md:col-span-2">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function previewImage(event, previewId) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById(previewId);
            output.src = reader.result;
            output.classList.remove('hidden');
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    function previewImages(event) {
        var files = event.target.files;
        var previewContainer = document.getElementById('additional_images_preview');
        var container = document.getElementById('additional_images_preview_container');
        previewContainer.innerHTML = '';
        container.style.backgroundImage = '';

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var reader = new FileReader();
            reader.onload = function(event) {
                var imgElement = document.createElement('img');
                imgElement.src = event.target.result;
                imgElement.classList.add('w-16', 'h-16', 'object-cover', 'rounded');
                previewContainer.appendChild(imgElement);
            };
            reader.readAsDataURL(file);
        }
    }
</script>
