@extends('layouts.dashboard.app')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="mt-14 bg-white container-fluid">
            <div class="p-4 rounded-lg border-gray-200 border-dashed shadow-lg dark:border-gray-700">
                <div class="container">
                    <h1>Chart Data</h1>
                    <table class="table mt-3 table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Rental Properties</th>
                                <th>Letting Properties</th>
                                <th>Completed Projects</th>
                                <th>Plots on Bid</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $lead)
                                <tr>
                                    <td>{{ $lead->id }}</td>
                                    <td>{{ $lead->rental_properties }}</td>
                                    <td>{{ $lead->letting_properties }}</td>
                                    <td>{{ $lead->completed_projects }}</td>
                                    <td>{{ $lead->plots_on_bid }}</td>
                                    <td>{{ $lead->date->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ route('admin.chart.edit2', $lead->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
