@extends('layout.main')

@section('title', 'Edit Album')

@section('content')
    <div class="container mx-auto py-12">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Album</h2>
            
            <form action="{{ route('albums.update', $album->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Album</label>
                    <input type="text" id="nama" name="nama" value="{{ $album->nama }}" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="artist_id" class="block text-sm font-medium text-gray-700">Artist</label>
                    <select name="artist_id" id="artist_id" class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach ($artists as $artist)
                            <option value="{{ $artist->id }}" @if ($album->artist_id == $artist->id) selected @endif>{{ $artist->nama }}</option>
                        @endforeach
                    </select>
                    @error('artist_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="release_date" class="block text-sm font-medium text-gray-700">Tahun Keluar</label>
                    <input type="date" id="release_date" name="release_date" value="{{ $album->release_date }}" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('release_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update Album</button>
                <a href="{{ url('albums') }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md">Cancel</a>
            </form>
        </div>
    </div>
@endsection
