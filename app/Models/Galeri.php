<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Galeri extends Model
{
    protected $fillable = [
        'user_id',
        'judul',
        'lokasi',
        'deskripsi',
        'foto',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /** URL publik foto (lewat symlink public/storage). */
    public function getFotoUrlAttribute(): string
    {
        return Storage::disk('public')->url($this->foto);
    }
}
