<?php

namespace App\Http\Controllers;

use App\Models\Lagu;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaguController extends Controller
{
    public function index()
    {
        $lagus = Lagu::all();
        return view('lagus.index', compact('lagus'));
    }

    public function create()
    {
        $artists = Artist::all();
        return view('lagus.create', compact('artists'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'artist_id' => 'required',
            'audio_file' => 'required|file|max:1000000000' // Max file size set to 1GB
        ]);

        // Cari atau buat artist berdasarkan nama
        $artist = Artist::firstOrCreate(['nama' => $request->artist_id]);

        // Simpan file audio dan dapatkan path-nya
        $audioPath = $request->file('audio_file')->store('audio_files', 'public');

        // Simpan lagu baru ke database
        Lagu::create([
            'title' => $request->title,
            'artist_id' => $artist->id,
            'genre' => $request->genre,
            'audio_file' => $audioPath,
        ]);

        return redirect()->route('lagus.index')->with('success', 'Lagu berhasil ditambahkan.');
    }

    public function show(Lagu $lagu)
    {
        return view('lagus.show', compact('lagu'));
    }

    public function edit(Lagu $lagu)
    {
        $artists = Artist::all();
        return view('lagus.edit', compact('lagu', 'artists'));
    }

    public function update(Request $request, Lagu $lagu)
    {
        $request->validate([
            'title' => 'required',
            'artist_id' => 'required|exists:artists,id',
            'genre' => 'required',
        ]);

        // Update lagu dengan data baru
        $lagu->update([
            'title' => $request->title,
            'artist_id' => $request->artist_id,
            'genre' => $request->genre,
        ]);

        // Jika ada file audio baru, simpan dan update path-nya
        if ($request->hasFile('audio_file')) {
            Storage::disk('public')->delete($lagu->audio_file);

            $audioPath = $request->file('audio_file')->store('audio_files', 'public');
            
            $lagu->update(['audio_file' => $audioPath]);
        }

        return redirect()->route('lagus.index')->with('success', 'Lagu berhasil diperbarui.');
    }

    public function destroy(Lagu $lagu)
    {
        // Hapus file audio dari penyimpanan
        Storage::disk('public')->delete($lagu->audio_file);

        // Hapus lagu dari database
        $lagu->delete();

        return redirect()->route('lagus.index')->with('success', 'Lagu berhasil dihapus.');
    }
}
