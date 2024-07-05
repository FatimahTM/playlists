@extends('layout.main')

@section('Nama', 'Daftar Lagu')

@section('content')
<div class="container mx-auto py-12">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <h2 class="text-2xl font-bold text-gray-800 p-6">Daftar Lagu</h2>
        
        <div class="px-6 py-4">
            <a href="{{ route('lagus.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Tambah Lagu Baru</a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium">Judul</th>
                        <th class="px-6 py-3 text-left text-xs font-medium">Artis</th>
                        <th class="px-6 py-3 text-left text-xs font-medium">Genre</th>
                        <th class="px-6 py-3 text-center text-xs font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach($lagus as $lagu)
                    <tr class="hover:bg-gray-100">
                        <td class="px-6 py-4">{{ $lagu->title }}</td>
                        <td class="px-6 py-4">{{ $lagu->artist->nama }}</td>
                        <td class="px-6 py-4">{{ $lagu->genre }}</td>
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('lagus.edit', $lagu->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                            <form action="{{ route('lagus.destroy', $lagu->id) }}" method="POST" class="inline-block">
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
