<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;
    protected $table='notifikasi';
    protected $fillable=['transaksi_id','message','status','user_id','barang_id','sendto'];

    public function Transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
