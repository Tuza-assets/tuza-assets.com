@extends('layouts.dashboard.app')

@section('content')
    @php
        $zonnings = \App\Models\Zonning::all();
    @endphp
    <div class="px-5 py-5 bg-white container-fluid">
        <div class="row">
            <div class="p-3 bg-white border rounded shadow-md col-lg-12">
                <div class="container mx-auto">
                    <!-- Step Tracker -->
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center space-x-4 w-full">
                            <div class="step-circle w-10 h-10 rounded-full flex items-center justify-center font-bold"
                                data-step="1">1</div>
                            <div class="step-line flex-grow h-1 bg-gray-300"></div>
                            <div class="step-circle w-10 h-10 rounded-full flex items-center justify-center font-bold"
                                data-step="2">2</div>
                            <div class="step-line flex-grow h-1 bg-gray-300"></div>
                            <div class="step-circle w-10 h-10 rounded-full flex items-center justify-center font-bold"
                                data-step="3">3</div>
                            <div class="step-line flex-grow h-1 bg-gray-300"></div>
                            <div class="step-circle w-10 h-10 rounded-full flex items-center justify-center font-bold"
                                data-step="4">4</div>
                        </div>
                    </div>

                    <!-- Step Labels -->
                    <div class="flex justify-between text-sm mb-8">
                        <span class="step-label" data-step="1">Property Details</span>
                        <span class="step-label" data-step="2">Location</span>
                        <span class="step-label" data-step="3">Specifications</span>
                        <span class="step-label" data-step="4">Pricing and Amenities</span>
                    </div>

                    <form 
                        action="{{ isset($property) ? route('admin.properties.update', $property->id) : route('admin.properties.store') }}" 
                        method="POST" 
                        class="step-content" 
                        enctype="multipart/form-data"
                    >
                        @csrf
                        @if(isset($property))
                            @method('PUT') {{-- For update operations --}}
                        @endif
                        
                      
                         @include('layouts.form.step1')

                        <!-- Step 2: Location Details -->
                        <div class="step hidden" id="step2">
                            <div class="bg-white  py-6">
                                <h2 class="text-2xl font-bold mb-4 text-gray-800">Location Details</h2>

                                @include('layouts.location.propery_location')

                                <div class="flex justify-between mt-4">
                                    <button type="button"
                                        class="prev-step btn btn-secondary px-6 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400"
                                        data-step="2">Previous</button>
                                    <button type="button"
                                        class="next-step btn btn-primary px-6 py-2 bg-orange-500 text-white rounded-lg hover:bg-blue-600"
                                        data-step="2">Next</button>
                                </div>
                            </div>
                        </div>

                        <!-- Step 3: Property Specifications -->
                        <div class="step hidden" id="step3">
                            <div class="bg-white  py-6">
                                <h2 class="text-2xl font-bold mb-4 text-gray-800">Property Specifications</h2>
                                @include('layouts.form.step3')
                                <div class="flex justify-between mt-4">
                                    <button type="button"
                                        class="prev-step btn btn-secondary px-6 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400"
                                        data-step="3">Previous</button>
                                    <button type="button"
                                        class="next-step btn btn-primary px-6 py-2 bg-orange-500 text-white rounded-lg hover:bg-blue-600"
                                        data-step="3">Next</button>
                                </div>
                            </div>
                        </div>

                        <!-- Step 4: Pricing and Availability -->
                        <div class="step hidden" id="step4">
                            <div class="bg-white  py-6">
                                <h2 class="text-2xl font-bold mb-4 text-gray-800">Pricing and Amenities</h2>
                                @include('layouts.form.step4')
                                <div class="flex justify-between mt-4">
                                    <button type="button"
                                        class="prev-step btn btn-secondary px-6 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400"
                                        data-step="4">Previous</button>
                                            <button type="submit" class="px-6 py-2 bg-green-500 text-white rounded-lg">
                                                {{ isset($property) ? 'Update Property' : 'Create Property' }}
                                            </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const steps = document.querySelectorAll('.step');
            const stepCircles = document.querySelectorAll('.step-circle');
            const stepLabels = document.querySelectorAll('.step-label');
            const nextButtons = document.querySelectorAll('.next-step');
            const prevButtons = document.querySelectorAll('.prev-step');
            let currentStep = 1;

            function updateStepIndicators(step) {
                // Reset circles and labels
                stepCircles.forEach((circle, index) => {
                    circle.classList.remove('bg-orange-500', 'bg-green-500', 'text-white');
                    circle.classList.add('bg-gray-300', 'text-gray-600');
                });

                stepLabels.forEach((label, index) => {
                    label.classList.remove('font-bold', 'text-green-600');
                    label.classList.add('text-gray-500');
                });

                // Highlight completed steps
                stepCircles.forEach((circle, index) => {
                    if (index + 1 < step) {
                        circle.classList.remove('bg-gray-300', 'text-gray-600');
                        circle.classList.add('bg-green-500', 'text-white');
                    }

                    // Highlight current step
                    if (index + 1 === step) {
                        circle.classList.remove('bg-gray-300', 'text-gray-600');
                        circle.classList.add('bg-orange-500', 'text-white');

                        // Highlight current step label
                        stepLabels[index].classList.remove('text-gray-500');
                        stepLabels[index].classList.add('font-bold', 'text-green-600');
                    }
                });
            }

            function showStep(step) {
                steps.forEach(s => s.classList.add('hidden'));
                steps[step - 1].classList.remove('hidden');
                updateStepIndicators(step);
                currentStep = step;
            }

            // Initial setup - highlight first step
            updateStepIndicators(1);

            nextButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const step = parseInt(this.dataset.step);
                    showStep(step + 1);
                });
            });

            prevButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const step = parseInt(this.dataset.step);
                    showStep(step - 1);
                });
            });
        });
    </script>
    <style>
        .btn-primary {
            background-color: orangered !important
        }
    </style>
@endsection
