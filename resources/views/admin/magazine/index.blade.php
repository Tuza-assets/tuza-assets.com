@extends('layouts.dashboard.app')
@section('content')
    <div class="p-4 mt-14 sm:ml-64">
        <!-- Magazine Table -->
        <div class="p-4 mb-8 bg-white border shadow-md">
            <a href="{{ route('admin.magazine.create') }}"
                class="px-5 py-2.5 text-sm font-medium text-center text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create
                Magazine</a>

            <table class="table mt-4 table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Document</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($magazines as $index => $magazine)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $magazine->title }}</td>
                            <td>
                                <button data-modal-target="authentication-modal-{{ $index }}"
                                    data-modal-toggle="authentication-modal-{{ $index }}"
                                    class="block px-5 py-2.5 text-sm font-medium text-center text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                    type="button">
                                    Download
                                </button>
                                <!-- Modal -->
                                <div id="authentication-modal-{{ $index }}" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div
                                                class="flex justify-between items-center p-4 rounded-t border-b md:p-5 dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Download
                                                </h3>
                                                <button type="button"
                                                    class="inline-flex justify-center items-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg end-2.5 hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="authentication-modal-{{ $index }}">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-4 md:p-5">
                                                <form class="space-y-4"
                                                    action="{{ route('admin.download.link', $magazine) }}" method="POST">
                                                    @csrf
                                                    <div>
                                                        <label for="name"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                                            name</label>
                                                        <input type="text" name="name" id="name"
                                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                            placeholder="Your name" required />
                                                    </div>
                                                    <div>
                                                        <label for="email"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                                            email</label>
                                                        <input type="email" name="email" id="email"
                                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                            placeholder="name@company.com" required />
                                                    </div>


                                                    <div class="form-group form-check">
                                                        <input type="checkbox" class="form-check-input" name="subscribed"
                                                            id="subscribed" value="1">
                                                        <label class="form-check-label" for="subscribed">Subscribe</label>
                                                    </div>
                                                    <button type="submit"
                                                        class="px-5 py-2.5 w-full text-sm font-medium text-center text-white bg-green-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Send
                                                        Download Link</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('admin.magazine.edit', $magazine) }}"
                                    class="p-4 py-2 text-white bg-green-500">Update</a>
                                <form action="{{ route('admin.magazine.destroy', $magazine) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- MagazineDownload Table -->
        <div class="p-4 bg-white border shadow-md">
            <h2 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white">Magazine Downloads</h2>
            <div class="mb-4">
                <a href="{{ route('admin.magazine-downloads.export-excel') }}"
                    class="px-5 py-2.5 text-sm font-medium text-center text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Export
                    to Excel</a>
                <a href="{{ route('admin.magazine-downloads.export-pdf') }}"
                    class="px-5 py-2.5 text-sm font-medium text-center text-white bg-orange-500 hover:bg-orange-500 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Export
                    to PDF</a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Magazine Title</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subscribed</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($magazineDownloads as $index => $download)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $download->magazine ? $download->magazine->title : 'N/A' }}</td>
                            <td>{{ $download->name }}</td>
                            <td>{{ $download->email }}</td>
                            <td>{{ $download->subscribed ? 'Yes' : 'No' }}</td>
                            <td>
                                <form action="{{ route('admin.magazine-downloads.destroy', $download->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this record?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-5 py-2.5 text-sm font-medium text-center text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
