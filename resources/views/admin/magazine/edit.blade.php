@extends('layouts.dashboard.app')

@section('content')
    <div class="p-4 bg-white">
        <div class="p-4 border bg-white shadow-md dark:border-gray-700">
            <div>
                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('admin.magazine.update', $magazine) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-label for="title" value="Title" />
                        <x-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ $magazine->title }}" required />
                    </div>

                    <div class="mt-4">
                        <x-label for="document" value="Document" />
                        <x-input id="document" class="block mt-1 w-full" type="file" name="document"  value="{{ $magazine->document }}" />
                        @if ($magazine->document)
                            <a href="{{ asset('public/'.$magazine->document)}}" target="_blank">Current Document</a>
                        @endif
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button class="ms-4 bg-green-500 text-white p-4 py-2">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
