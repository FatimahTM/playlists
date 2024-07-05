<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::all();
        return view('artist.index', compact('artists'));
    }

    public function create()
    {
        return view('artist.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $val = $request->validate([
            'nama' => 'required|unique:artists',
            'asal' => 'required',
            'tanggal_lahir' => 'required',
            'url_foto' => 'required|file|mimes:png,jpg,svg|max:5000'
        ]);

        $ext = $request->url_foto->getClientOriginalExtension();
        $val['url_foto'] = $request->nama . "." . $ext;

        // upload file
        $request->url_foto->move('foto', $val['url_foto']);

        // Simpan data ke database
        Artist::create($val);

        // Redirect ke halaman lain dengan pesan sukses
        return redirect()->route('artists.index')->with('success', $val['nama'] . ' berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artist $artist
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        return view('artist.edit', compact('artist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artist $artist)
{
    // Validasi input
    $request->validate([
        'nama' => 'required|string|max:255',
        'asal' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
        'url_foto' => 'nullable|file|mimes:png,jpg,svg|max:5000'
    ]);

    // Update data artis
    $artist->nama = $request->input('nama');
    $artist->asal = $request->input('asal');
    $artist->tanggal_lahir = $request->input('tanggal_lahir');

    // Cek apakah ada file foto baru yang diupload
    if ($request->hasFile('url_foto')) {
        // Hapus foto lama
        if (File::exists(public_path('foto/'.$artist->url_foto))) {
            File::delete(public_path('foto/'.$artist->url_foto));
        }

        // Simpan foto baru
        $file = $request->file('url_foto');
        $filename = $artist->nama . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('foto'), $filename);
        $artist->url_foto = $filename;
    }

    // Simpan perubahan
    $artist->save();

    return redirect()->route('artists.index')->with('success', 'Artist updated successfully');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
{
    // Hapus foto terlebih dahulu jika ada
    if (File::exists(public_path('foto/' . $artist->url_foto))) {
        File::delete(public_path('foto/' . $artist->url_foto));
    }

    // Hapus record dari database
    $artist->delete();

    return redirect()->route('artists.index')->with('success', 'Artist deleted successfully');
}
}
