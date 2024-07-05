<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        return view('album.index', ['albums' => $albums]);
    }

    public function create()
    {
        $artists = Artist::all();
        return view('album.create', compact('artists'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|unique:albums',
            'artist_id' => 'required|exists:artists,id',
            'release_date' => 'required|date'
        ]);

        Album::create($validatedData);

        return redirect()->route('albums.index')->with('success', $validatedData['nama'] . ' berhasil disimpan');
    }

    public function edit(Album $album)
    {
        $artists = Artist::all();
        return view('album.edit', compact('album', 'artists'));
    }

    public function update(Request $request, Album $album)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'artist_id' => 'required|exists:artists,id',
            'release_date' => 'required|date'
        ]);

        $album->update($validatedData);

        return redirect()->route('albums.index')->with('success', 'Album berhasil diperbarui.');
    }

    public function destroy(Album $album)
    {
        $album->delete();

        return redirect()->route('albums.index')->with('success', 'Album berhasil dihapus.');
    }
}
