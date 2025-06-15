<x-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <x-authentication-card>
                <x-slot name="logo">
                    <x-authentication-card-logo />
                </x-slot>

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('admin.magazine.edit', $magazine) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-label for="title" value="Title" />
                        <x-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ $magazine->title }}" required />
                    </div>

                    <div class="mt-4">
                        <x-label for="document" value="Document" />
                        <x-input id="document" class="block mt-1 w-full" type="file" name="document" />
                        @if ($magazine->document)
                            <a href="{{ Storage::url($magazine->document) }}" target="_blank">Current Document</a>
                        @endif
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ms-4">
                            Update
                        </x-button>
                    </div>
                </form>
            </x-authentication-card>
        </div>
    </div>
</x-app-layout>
