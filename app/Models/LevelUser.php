<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelUser extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relasi ke User
    public function users()
    {
        return $this->hasMany(User::class);
    }
}

