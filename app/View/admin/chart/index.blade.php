@extends('layouts.dashboard.app')

@section('content')
    <h1>Leads</h1>
    <a href="{{ route('leads.create') }}">Create New Lead</a>
    <table>
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
            @foreach($data as $lead)
                <tr>
                    <td>{{ $lead->id }}</td>
                    <td>{{ $lead->rental_properties }}</td>
                    <td>{{ $lead->letting_properties }}</td>
                    <td>{{ $lead->completed_projects }}</td>
                    <td>{{ $lead->plots_on_bid }}</td>
                    <td>{{ $lead->date }}</td>
                    <td>
                        <a href="{{ route('leads.show', $lead->id) }}">Show</a>
                        <a href="{{ route('leads.edit', $lead->id) }}">Edit</a>
                        <form action="{{ route('leads.destroy', $lead->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
