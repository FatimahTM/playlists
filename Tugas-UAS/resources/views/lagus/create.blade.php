@extends('layout.main')

@section('title', 'Tambah Lagu')

@section('content')
<div class="container mx-auto py-12">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Tambah Lagu</h2>

        {{ $errors }}
        
        <form action="{{ route('lagus.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Judul Lagu</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="artist_id" class="block text-sm font-medium text-gray-700">Artis</label>
                <select name="artist_id" id="artist_id" class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @foreach ($artists as $artist)
                        <option value="{{ $artist->id }}">{{ $artist->nama }}</option>
                    @endforeach
                </select>
                @error('artist_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-4">
                <label for="genre" class="block text-sm font-medium text-gray-700">Genre</label>
                <input type="text" id="genre" name="genre" value="{{ old('genre') }}" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('genre')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="audio_file" class="block text-sm font-medium text-gray-700">File Audio</label>
                <input type="file" id="audio_file" name="audio_file" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('audio_file')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Simpan</button>
            <a href="{{ route('lagus.index') }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md">Batal</a>
        </form>
    </div>
</div>
<p>©2024</p>
@endsection
