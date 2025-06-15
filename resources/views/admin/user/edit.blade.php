@extends('layouts.dashboard.app')

@section('content')
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
        <h2>Edit User</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.user.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}"
                    class="block w-full mt-1 form-input">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}"
                    class="block w-full mt-1 form-input">
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700">Status</label>
                <select name="status" id="status" class="block w-full mt-1 form-select">
                    <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Activate</option>
                    <!--<option value="2" {{ $user->status == 2 ? 'selected' : '' }}>Designer</option>-->
                    <!--<option value="3" {{ $user->status == 3 ? 'selected' : '' }}>Blogger</option>-->
                    <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Disactivate</option>
                </select>
            </div>

            <div class="mb-4">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
