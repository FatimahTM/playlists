@extends('layout.main')

@section('Nama', 'Album List')

@section('content')
<div class="container mx-auto py-12">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <h2 class="text-2xl font-bold text-gray-800 p-6">Album List</h2>
        
        <div class="px-6 py-4">
            <a href="{{ route('albums.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Add New Album</a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium">Artist</th>
                        <th class="px-6 py-3 text-left text-xs font-medium">Year</th>
                        <th class="px-6 py-3 text-center text-xs font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach($albums as $album)
                    <tr class="hover:bg-gray-100">
                        <td class="px-6 py-4">{{ $album->nama }}</td>
                        <td class="px-6 py-4">{{ $album->artist->nama ?? 'No Nama' }}</td>
                        <td class="px-6 py-4">{{ $album->release_date }}</td> <!-- Pastikan kolom ini sesuai dengan yang ada di database -->
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('albums.edit', $album->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                            <form action="{{ route('albums.destroy', $album->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 ml-2">Delete</button>
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
