@extends('layouts.dashboard.app')

@section('content')
<div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
    <div class="container px-4 py-2 mx-auto">
        <h1 class="mb-4 text-2xl font-bold">Users</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b">#</th>
                        <th class="px-4 py-2 border-b">Name</th>
                        <th class="px-4 py-2 border-b">Email</th>
                        <th class="px-4 py-2 border-b">Phone</th>
                        <th class="px-4 py-2 border-b">User name</th>
                        <th class="px-4 py-2 border-b">Password</th>
                        <th class="px-4 py-2 border-b">Province</th>
                        <th class="px-4 py-2 border-b">District</th>
                        <th class="px-4 py-2 border-b">Sector</th>
                        <th class="px-4 py-2 border-b">Cell</th>
                        <th class="px-4 py-2 border-b">Village</th>
                        <th class="px-4 py-2 border-b">Status</th>
                        <th class="px-4 py-2 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $index => $user)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2 border-b">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 border-b">{{ $user->name }}</td>
                            <td class="px-4 py-2 border-b">{{ $user->email }}</td>
                            <td class="px-4 py-2 border-b">{{ $user->phone }}</td>
                            <td class="px-4 py-2 border-b">{{ $user->username }}</td>
                            <td class="px-4 py-2 border-b">
                                <button onclick="togglePassword({{ $user->id }})"
                                    class="text-sm text-gray-500 hover:underline">
                                Show
                            </button>
                            <div id="password-{{ $user->id }}" class="hidden mt-1 text-xs text-gray-600">
                                Password: <span class="font-mono">{{ $user->SecretPassword ?? 'Null' }}</span>
                            </div>
                            </td>
                            <td class="px-4 py-2 border-b">{{ $user->province }}</td>
                            <td class="px-4 py-2 border-b">{{ $user->district }}</td>
                            <td class="px-4 py-2 border-b">{{ $user->sector }}</td>
                            <td class="px-4 py-2 border-b">{{ $user->cell }}</td>
                            <td class="px-4 py-2 border-b">{{ $user->village }}</td>
                            <td class="px-4 py-2 border-b">
                                @php
                                    $statusConfig = [
                                        0 => ['label' => 'Blocked', 'bg' => 'bg-red-100', 'text' => 'text-red-800'],
                                        1 => ['label' => 'Admin', 'bg' => 'bg-blue-100', 'text' => 'text-blue-800'],
                                        2 => ['label' => 'Blogger', 'bg' => 'bg-purple-100', 'text' => 'text-purple-800'],
                                        4 => ['label' => 'Partner', 'bg' => 'bg-green-100', 'text' => 'text-green-800'],
                                    ];

                                    $currentStatus = $statusConfig[$user->status] ?? ['label' => 'Unknown', 'bg' => 'bg-gray-100', 'text' => 'text-gray-800'];
                                @endphp

                                <span class="px-2 py-1 text-xs rounded-full {{ $currentStatus['bg'] }} {{ $currentStatus['text'] }}">
                                    {{ $currentStatus['label'] }}
                                </span>
                            </td>
                            <td class="px-4 py-2 border-b">
                                <a href="{{ route('admin.user.edit', $user->id) }}"
                                   class="mr-2 text-blue-500 hover:underline">Edit</a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
function togglePassword(userId) {
    const passwordDiv = document.getElementById('password-' + userId);
    const button = event.target;

    if (passwordDiv.classList.contains('hidden')) {
        passwordDiv.classList.remove('hidden');
        button.textContent = 'Hide';
    } else {
        passwordDiv.classList.add('hidden');
        button.textContent = 'Show';
    }
}
</script>
@endsection