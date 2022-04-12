<?php

namespace App\Http\Controllers;


use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use PDF;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function laporananggota()
    {
        return view('laporan.anggota');
    }
    public function laporanbarang()
    {
        return view('laporan.barang');
    }
    public function laporantransaksi()
    {
        return view('laporan.transaksi');
    }

    public function dwanggota (Request $req)
    {
        $tglskrng=date('d F Y', strtotime(now()));
        $mulai=$req->mulai;
        $akhir=$req->akhir;
        // $p=DB::select('SELECT anggota .*,users.name,users.jk,users.no_anggota,users.nohp FROM transaksi JOIN users ON transaksi.user_id=users.id  WHERE transaksi.status="Pinjam" AND transaksi.created_at BETWEEN ? AND ?',[$req->mulai,$req->akhir]);
        $p=DB::select('SELECT * FROM `users` WHERE created_at BETWEEN ? AND ?',[$mulai,$akhir]);
        // $p=DB::select('SELECT transaksi.*,users.name,users.jk,users.no_anggota,users.nohp,transaksi.created_at FROM transaksi JOIN users on
        // transaksi.user_id=users.id WHERE DATE(transaksi.created_at) <=? AND transaksi.status="Pinjam" AND DATE(transaksi.created_at)>=?', [$req->mulai,$req->akhir]);

        // dd($req->all());
        view()->share('p', $p);
        $pdf_doc = PDF::loadView('laporan.lapanggota', compact('p','mulai','akhir','tglskrng'))->setPaper('a4', 'landscape');

        return $pdf_doc->download('laporan-anggota.pdf');

    }
    public function dwbarang(Request $req)
    {

        $tglskrng=date('d F Y', strtotime(now()));

        $mulai=$req->mulai;
        $akhir=$req->akhir;
        $p=DB::select('SELECT * FROM `barang` WHERE created_at BETWEEN ? AND ?',[$mulai,$akhir]);
        // $p=DB::select('SELECT transaksi.*,users.name,users.jk,users.no_anggota,users.nohp FROM transaksi JOIN users ON transaksi.user_id=users.id  WHERE transaksi.status="Kembali" AND transaksi.created_at BETWEEN ? AND ?',[$req->mulai,$req->akhir]);
        // dd($ps);
        view()->share('p', $p);

        $pdf_doc = PDF::loadView('laporan.lapbarang', compact('p','mulai','akhir','tglskrng'))->setPaper('a4', 'landscape');

        return $pdf_doc->download('laporan-barang.pdf');
    }
    public function dwtransaksi(Request $req)
    {
        $tglskrng=date('d F Y', strtotime(now()));

        $mulai=$req->mulai;
        $akhir=$req->akhir;
        $p=DB::select('SELECT transaksi.*,users.name,barang.kodebarang,tgl_pinjam,tgl_kembali,transaksi.status,barang.namabarang FROM `transaksi` JOIN users ON users.id=transaksi.user_id JOIN barang ON barang.id=transaksi.barang_id WHERE transaksi.created_at BETWEEN ? AND ?',[$mulai,$akhir]);
        // $p=DB::select('SELECT transaksi.*,users.name,users.jk,users.no_anggota,users.nohp FROM transaksi JOIN users ON transaksi.user_id=users.id  WHERE transaksi.status="Kembali" AND transaksi.created_at BETWEEN ? AND ?',[$mulai,$akhir]);
        // dd($ps);
        view()->share('p', $p);

        $pdf_doc = PDF::loadView('laporan.laptransaksi', compact('p','mulai','akhir','tglskrng'))->setPaper('a4', 'landscape');

        return $pdf_doc->download('laporan-transaksi.pdf');
    }
}
