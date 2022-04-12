<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table='anggota';
    protected $fillable=['user_id','nisn','nama','tempat_lahir','tgl_lahir','jk','kelas'];
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
