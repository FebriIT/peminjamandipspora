<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Transaksi;

class KategoriController extends Controller
{
    public function index()
    {
        $data=Kategori::all();
        return view('kategori.index',compact('data'));
    }

    public function create()
    {
        return view('kategori.tambah');
    }
    public function store(Request $request)
    {
        $data=new Kategori;
        $data->nama=$request->nama;
        $data->save();
        return redirect('/admin/kategori')->with('sukses','Data Berhasil Ditambahkan');
    }

    public function destroy($id)
    {
        $data=Kategori::find($id);
        $buku=Buku::where('kategori_id',$id)->delete();
        $transaksi=Transaksi::where('kategori_id',$id)->delete();
        $data->delete();
        return redirect('/admin/kategori')->with('sukses','Data Berhasil Dihapus');
    }

    public function edit($id)
    {
        $data=Kategori::find($id);
        return view('kategori.edit',compact('data'));
    }

    public function update(Request $req,$id)
    {
        $data=Kategori::find($id)->update($req->all());
        return redirect('/admin/kategori')->with('sukses','Data Berhasil Diubah');

    }
}
