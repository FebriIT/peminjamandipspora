<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;



class DataBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Barang::orderBy('id','desc')->get();
        return view('barang.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kodebarang' => 'required|max:255|unique:barang,kodebarang',


        ]);
        $data=new Barang;
        $data->kodebarang=$request->kodebarang;
        $data->namabarang=$request->namabarang;
        $data->merek=$request->merek;
        $data->jumlahbarang=$request->jumlahbarang;
        $data->tglpembelian=$request->tglpembelian;
        $data->deskripsi=$request->deskripsi;


        if ($request->has('cover')) {
            $covername=$request->file('cover')->getClientOriginalName().'.'.time().'.'.$request->file('cover')->extension();
            $request->file('cover')->move(public_path() . '/storage/coverbuku', $covername);
            $data->cover = $covername;
            $data->save();
        }else{
            $data->save();
        }
        // Buku::create($request->all());
        return redirect('/admin/databarang')->with('sukses','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit($buku)
    {
        // dd($buku);
        $data=Barang::find($buku);
        return view('barang.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // dd($request->all());
        $this->validate($request, [
            'judul' => 'required|max:255',
            'isbn'=>'unique:buku,isbn|max:25',
            'pengarang'=>'required|max:50',
            'penerbit' => 'required|max:50',
            'tahun_terbit' => 'required|max:4',
            'jumlah_buku'=>'required|max:5',
            'deskripsi'=>'required|max:255',

        ]);

        $data=Barang::find($id);


        $data->update([
            'judul'=>$request->judul,
            'isbn'=>$request->isbn,
            'pengarang'=>$request->pengarang,
            'penerbit'=>$request->penerbit,
            'tahun_terbit'=>$request->tahun_terbit,
            'jumlah_buku'=>$request->jumlah_buku,
            'deskripsi'=>$request->deskripsi,
            'lokasi'=>$request->lokasi,


        ]);
        if ($request->has('cover')) {
            unlink(public_path() . '/storage/coverbuku/' . $data->cover);
            // dd($request->file('cover'));
            $covername=$request->file('cover')->getClientOriginalName().'.'.time().'.'.$request->file('cover')->extension();
            $request->file('cover')->move(public_path() . '/storage/coverbuku', $covername);

            $data->update(['cover'=>$covername]);

        }


        return redirect('/admin/buku')->with('sukses','Data Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku=Barang::find($id);


        $syarat = 'public/coverbuku/'. $buku->cover;
        // dd(Storage::exists($image_path));



        Transaksi::where('buku_id',$buku->id)->delete();
        if (Storage::exists($syarat)) {
            Storage::delete($syarat);
        }
        $buku->delete();
        return back()->with('sukses','Data Berhasil Ditambahkan');
    }

    public function pinjam($id)
    {
        $data=Barang::find($id);
        $anggota=User::where('role','user')->get();
        return view('barang.peminjaman',compact('data','anggota'));
    }
    public function pinjamstore(Request $req)
    {


        // dd($req->all());
        $transaksi=new Transaksi;
        $transaksi->user_id=$req->user_id;
        $transaksi->barang_id=$req->barang_id;
        $datenow=date('Y-m-d', strtotime(now()));
        $transaksi->tgl_pinjam=$datenow;
        $transaksi->tgl_kembali=$req->tgl_kembali;
        $transaksi->status='Dipinjam';
        //kondisi stok buku berkurang
        // dd($req->all);
        $barang=Barang::find($req->barang_id);
        $stokbarangberkurang=$barang->jumlahbarang;
        $barang->update([
            'jumlah_buku'=>$stokbarangberkurang
        ]);
        $transaksi->save();

        return redirect('/admin/transaksi')->with('sukses','Data Berhasil Ditambahkan');
    }

    public function detail($id)
    {
        $data=Barang::find($id);
        return view('barang.detail',compact('data'));
    }
}
