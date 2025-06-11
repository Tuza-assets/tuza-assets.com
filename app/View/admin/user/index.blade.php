
<x-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <div class="container mx-auto p-4">
                <h1 class="text-2xl font-bold mb-4">Users</h1>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border-b">ID</th>
                                <th class="px-4 py-2 border-b">Name</th>
                                <th class="px-4 py-2 border-b">Email</th>
                                <th class="px-4 py-2 border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr class="hover:bg-gray-100">
                                    <td class="px-4 py-2 border-b">{{ $user->id }}</td>
                                    <td class="px-4 py-2 border-b">{{ $user->name }}</td>
                                    <td class="px-4 py-2 border-b">{{ $user->email }}</td>
                                    <td class="px-4 py-2 border-b">
                                        <a href="{{ route('admin.user.edit', $user->id) }}" class="text-blue-500 hover:underline">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


