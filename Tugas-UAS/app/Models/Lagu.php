<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lagu extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'artist_id',
        'genre', // tambahkan kolom genre ke fillable
        'audio_file', // tambahkan kolom audio_file ke fillable
    ];

    // Relasi dengan model Artist
    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
}
