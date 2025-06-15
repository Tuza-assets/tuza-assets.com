<x-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <h2>Edit User</h2>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.user.update', $user) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-input mt-1 block w-full">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-input mt-1 block w-full">
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-gray-700">Status</label>
                    <select name="status" id="status" class="form-select mt-1 block w-full">
                        <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Admin</option>
                        <option value="2" {{ $user->status == 2 ? 'selected' : '' }}>Designer</option>
                        <option value="3" {{ $user->status == 3 ? 'selected' : '' }}>Blogger</option>
                        <option value="5" {{ $user->status == 5 ? 'selected' : '' }}>Disactivate</option>
                    </select>
                </div>

                <div class="mb-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
