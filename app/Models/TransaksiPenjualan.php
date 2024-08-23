<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPenjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'barang_id',
        'jumlah',
        'total_harga',
        'tanggal',
    ];

    // Relasi ke Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}

