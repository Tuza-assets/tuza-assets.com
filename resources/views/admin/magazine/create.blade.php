@extends('layouts.dashboard.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center min-vh-100 p-4">
        <div class="w-100 max-w-md p-4 bg-white shadow-md">
         <h2 class="text-left mb-4">Create New magazine</h2>
            <div> 
                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('admin.magazine.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <x-label for="title" value="Title" />
                        <x-input id="title" class="block mt-1 w-full" type="text" name="title" required />
                    </div>

                    <div class="mt-4">
                        <x-label for="document" value="Document" />
                        <x-input id="document" class="block  mt-1 w-full" type="file" name="document" required />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button class="ms-4 bg-green-500 hover:bg-green-700 text-white p-4 py-2">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
