<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;

    protected $table = "kelurahans";
    protected $primaryKey = "id";
    protected $fillable = ['id', 'nama_kel', 'kepala_kel', 'alamat', 'kecamatan_id'];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }
}
