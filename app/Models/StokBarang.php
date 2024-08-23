<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokBarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'barang_id',
        'jumlah',
        'tanggal',
    ];

    // Relasi ke Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}