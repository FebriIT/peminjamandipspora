<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table='barang';
    protected $fillable=['kodebarang','namabarang','merek','jumlahbarang','tglpembelian','deskripsi','cover'];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class)
        ;
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

}
