@extends('layout.main')

@section('title', 'Artist List')

@section('content')
<div class="container mx-auto py-12">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Artist List</h2>

        @if (session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="mt-6">
            <a href="{{ route('artists.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Add New Artist</a>
        </div>
        <br>
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="uppercase font-semibold text-sm">Name</th>
                    <th class="uppercase font-semibold text-sm">Origin</th>
                    <th class="uppercase font-semibold text-sm">Date of Birth</th>
                    <th class="uppercase font-semibold text-sm">Photo</th>
                    <th class="uppercase font-semibold text-sm">Actions</th> <!-- Tambah kolom untuk Actions -->
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($artists as $artist)
                <tr>
                    <td class="text-center">{{ $artist->nama }}</td>
                    <td class="text-center">{{ $artist->asal }}</td>
                    <td class="text-center">{{ $artist->tanggal_lahir }}</td>
                    <td class="text-center"><img src="{{ url('foto/' . $artist->url_foto) }}" class="rounded mx-auto d-block" style="width: 100px; height: auto;"></td>
                    <td class="text-center">
                        <a href="{{ route('artists.edit', $artist->id) }}" class="bg-yellow-400 text-green-500 px-4 py-2 rounded-md hover:bg-yellow-500 hover:text-black">Edit</a>

                        <form action="{{ route('artists.destroy', $artist->id) }}" method="POST" style="display: inline-block" onsubmit="return confirm('Are you sure you want to delete this artist?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-green-500 px-4 py-2 rounded-md hover:bg-red-600 hover:text-white ml-2">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
