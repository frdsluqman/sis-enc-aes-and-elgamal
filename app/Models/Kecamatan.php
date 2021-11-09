<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $fillable = ['id', 'nama_kec', 'kepala_kec', 'alamat'];

    public function kelurahan()
    {
        return $this->hasMany(Kelurahan::class);
    }

    public function dpt()
    {
        return $this->hasMany(Dpt::class);
    }
}
