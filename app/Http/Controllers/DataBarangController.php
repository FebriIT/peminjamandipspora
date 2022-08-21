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
        // $data->jumlah=$request->jumlahbarang;


        if ($request->has('cover')) {
            $covername=$request->file('cover')->getClientOriginalName().'.'.time().'.'.$request->file('cover')->extension();
            $request->file('cover')->move(public_path() . '/storage/coverbarang', $covername);
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
        

        $data=Barang::find($id);


        $data->update([
            
            'namabarang'=>$request->namabarang,
            'merek'=>$request->merek,
            'jumlahbarang'=>$request->jumlahbarang,
            'tglpembelian'=>$request->tglpembelian,
            'deskripsi'=>$request->deskripsi,



        ]);

        if ($request->has('cover')) {
            unlink(public_path() . '/storage/coverbarang/' . $data->cover);
            // dd($request->file('cover'));
            $covername=$request->file('cover')->getClientOriginalName().'.'.time().'.'.$request->file('cover')->extension();
            $request->file('cover')->move(public_path() . '/storage/coverbarang', $covername);

            $data->update(['cover'=>$covername]);

        }


        return redirect('/admin/databarang')->with('sukses','Data Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang=Barang::find($id);


        $syarat = 'public/coverbarang/'. $barang->cover;
        // dd(Storage::exists($image_path));



        Transaksi::where('barang_id',$barang->id)->delete();
        if (Storage::exists($syarat)) {
            Storage::delete($syarat);
        }
        $barang->delete();
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
        $transaksi->jumlah=$req->jumlah;
        //kondisi stok buku berkurang
        $barang=Barang::find($req->barang_id);
        if($barang->jumlahbarang>$req->jumlah){
            $stokbarangberkurang=$barang->jumlahbarang-$req->jumlah;
        // dd($stokbarangberkurang);
            $barang->update([
                'jumlahbarang'=>$stokbarangberkurang
            ]);
            $transaksi->save();
        }else{
            return back()->with('sukses','Stok Barang Tidak Mencukupi');

        }


        return redirect('/admin/transaksi')->with('sukses','Data Berhasil Ditambahkan');
    }

    public function detail($id)
    {
        $data=Barang::find($id);
        return view('barang.detail',compact('data'));
    }
}
