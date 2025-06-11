@extends('layouts.dashboard.app')

@section('content')
    <div class="container-fluid bg-white">
        <div class="row ">
            <div class="col-lg-12 rounded border  bg-white shadow-md p-3">
                     <h1 class="text-2xl font-bold mb-4">Zonning</h1>
        <a href="{{ route('admin.Zonning.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Create Zonning</a>
        <table class="table-auto w-full mt-4">
            <thead>
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Zonnings as $Zonning)
                <tr>
                    <td class="border px-4 py-2">{{ $Zonning->name }}</td>
                    <td class="border px-4 py-2 d-flex gap-2">
                        <a href="{{ route('admin.Zonning.show', $Zonning->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 h-1/2 rounded">View</a>
                        <a href="{{ route('admin.Zonning.edit', $Zonning->id) }}" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 h-1/2 rounded">Edit</a>
                        <form action="{{ route('admin.Zonning.destroy', $Zonning->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
            </div>
        </div>
       
    </div>
@endsection