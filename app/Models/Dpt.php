<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dpt extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $fillable = ['id', 'jml_tps', 'jml_laki', 'jml_perempuan', 'file', 'kecamatan_id'];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }
}
