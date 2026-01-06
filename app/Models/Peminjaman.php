<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    protected $fillable = ['nama_peminjam', 'rt_peminjam', 'alat_id', 'tanggal_pinjam', 'durasi', 'total', 'status'];

    protected $casts = [
        'tanggal_pinjam' => 'date',
    ];

    public function alat(): BelongsTo
    {
        return $this->belongsTo(Alat::class, 'alat_id');
    }

    public function getTanggalFormatAttribute()
    {
        return $this->tanggal_pinjam ? $this->tanggal_pinjam->format('d M Y') : '-';
    }
}