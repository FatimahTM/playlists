<?php
// database/seeders/AlbumSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Album;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tambahkan contoh data album
        Album::create([
            'title' => 'Album Pertama',
            'artist' => 'Artis Pertama',
            'genre' => 'Pop',
            'year' => 2020,
        ]);

        Album::create([
            'title' => 'Album Kedua',
            'artist' => 'Artis Kedua',
            'genre' => 'Rock',
            'year' => 2019,
        ]);

        // Tambahkan data lain sesuai kebutuhan
    }
}
