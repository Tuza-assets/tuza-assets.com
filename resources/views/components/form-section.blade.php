@props(['submit'])

<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-1 md:gap-6']) }}>
    <div class="mt-2 md:mt-0 md:col-span-2">
        <form wire:submit="{{ $submit }}">
            <div class="px-4 py-3 bg-white sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
                <div class="">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div class="flex items-center justify-end px-4 py-3 shadow bg-gray-50 text-end sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>
