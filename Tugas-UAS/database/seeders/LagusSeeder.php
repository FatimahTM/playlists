<?php
use Illuminate\Database\Seeder;
use App\Models\Lagu;
use App\Models\Artist;

class LaguSeeder extends Seeder
{
    public function run()
    {
        // Cari artist Tulus berdasarkan nama
        $artistTulus = Artist::where('name', 'Tulus')->first();

        // Tambahkan lagu-lagu baru
        Lagu::create([
            'title' => 'Gajah',
            'artist_id' => $artistTulus->id,
            'album' => 'Album Tulus',
            'genre' => 'Pop',
        ]);

        Lagu::create([
            'title' => 'Sepatu',
            'artist_id' => $artistTulus->id,
            'album' => 'Album Tulus',
            'genre' => 'Pop',
        ]);

        Lagu::create([
            'title' => 'Diri',
            'artist_id' => $artistTulus->id,
            'album' => 'Album Tulus',
            'genre' => 'Pop',
        ]);
    }
}
