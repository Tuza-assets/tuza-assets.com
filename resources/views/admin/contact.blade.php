@extends('layouts.dashboard.app')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="mt-14 rounded-lg border-gray-200 dark:border-gray-700">
            <div class="row">
                <h2>Contacts</h2>
                @if ($contacts)
                    @forelse ($contacts as $item)
                        <div class="p-4 col-lg-12">
                            <div class="d-flex row">
                                <span class=""> {{ $item->email }}</span><span class="">
                                    {{ $item->tel }}</span>
                            </div>
                            <div class="">Subject: <strong> {{ $item->subject }}</strong></div>
                            <div class="">
                                {{ $item->message }}
                            </div>
                        </div>
                        <hr>
                    @empty
                    @endforelse
                @endif

            </div>
        </div>
    </div>
@endsection
