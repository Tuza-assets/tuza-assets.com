@extends('layouts.dashboard.app')

@section('content')
    <div class="p-4 bg-white">
        <div class="p-4 border-2 border-gray-200 border-dashed shadow rounded-lg dark:border-gray-700">
            <div>
                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('admin.chart.edit', $Lead->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-label for="rental_properties" value="Rental properties" />
                        <x-input id="rental_properties" class="block mt-1 w-full" type="text" name="rental_properties"
                            value="{{ $Lead->rental_properties }}" required />
                    </div>
                    <div>
                        <x-label for="letting_properties" value="Letting properties" />
                        <x-input id="letting_properties" class="block mt-1 w-full" type="text" name="letting_properties"
                            value="{{ $Lead->letting_properties }}" required />
                    </div>
                    <div>
                        <x-label for="completed_projects" value="Completed projects" />
                        <x-input id="completed_projects" class="block mt-1 w-full" type="text" name="completed_projects"
                            value="{{ $Lead->completed_projects }}" required />
                    </div>
                    <div>
                        <x-label for="plots_on_bid" value="Plots on bid" />
                        <x-input id="plots_on_bid" class="block mt-1 w-full" type="text" name="plots_on_bid"
                            value="{{ $Lead->plots_on_bid }}" required />
                    </div>
                    <div>
                        <x-label for="plots_on_bid" value="Plots on bid" />
                        <x-input id="date" class="block mt-1 w-full" type="date" name="date"
                            value="{{ $Lead->date->format('Y-m-d') }}" required />
                    </div>


                    <div class="flex items-center justify-end mt-4">
                        <button class="ms-4 bg-green-700 p-4 py-2 text-white">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
