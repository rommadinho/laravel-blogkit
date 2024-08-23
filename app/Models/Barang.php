<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'kategori_id',
        'harga',
        'stok',
        'deskripsi',
    ];

    // Relasi ke KategoriBarang
    public function kategori()
    {
        return $this->belongsTo(KategoriBarang::class, 'kategori_id');
    }

    // Relasi ke StokBarang
    public function stokBarangs()
    {
        return $this->hasMany(StokBarang::class);
    }
}
