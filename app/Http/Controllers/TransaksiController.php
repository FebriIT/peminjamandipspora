<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Anggota;
use App\Models\Notifikasi;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Mockery\Matcher\Not;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()->role=='admin'){
            $transaksi=Transaksi::all();


                $transaksi1=DB::table('transaksi')->whereNotExists(function($query){
                    $query->select(DB::raw(1))
                    ->from('notifikasi')
                    ->whereColumn('transaksi.id','notifikasi.transaksi_id');
                })
                ->get();


                foreach($transaksi1 as $row){
                        if($row->status=='Terlambat'){
                            $data=new Notifikasi();
                            $data->transaksi_id=$row->id;
                            $data->status='0';
                            $data->user_id=$row->user_id;
                            $data->barang_id=$row->barang_id;
                            $data->sendto=1;

                            $data->save();

                            $data=new Notifikasi;
                            $data->transaksi_id=$row->id;
                            $data->status='0';
                            $data->user_id=$row->user_id;
                            $data->barang_id=$row->barang_id;
                            $data->sendto=$row->user_id;
                            $data->save();
                        }



                // dd($row);


                }

        }else{

            $transaksi=Transaksi::where('user_id',Auth::user()->id)->get();
        }

        $tglsekarang=date('d', strtotime(now()));
        $blnsekarang=date('m', strtotime(now()));
        $message=null;
        foreach ($transaksi as $roww){
            $tglterakhir=date('d', strtotime($roww->tgl_kembali));
            $blnterakhir=date('m', strtotime($roww->tgl_kembali));
            // dd($blnterakhir);
            if($blnterakhir<=$blnsekarang){
                if ($tglterakhir<$tglsekarang){
                    if($roww->status!='Dikembalikan'){
                        $updatetransaki=Transaksi::find($roww->id)->update([
                            'status'=>'Terlambat'
                        ]);

                    }
                    // $message='data terlambat';

                    // dd($roww->count());
                }
            }

        }


        return view('transaksi.index',compact('transaksi','tglsekarang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang=Barang::all();

        return view('transaksi.tambah',compact('barang','anggota'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data= new Transaksi;
        $data->kode_transaksi=$request->kode_transaksi;
        $data->anggota_id=$request->anggota_id;
        $data->barang_id=$request->barang_id;
        // $data->kategori_id=$request->kategori_id;
        $data->tgl_pinjam=$request->tgl_pinjam;
        $data->tgl_kembali=$request->tgl_kembali;


        $data->status='Dipinjam';
        $data->ket=$request->ket;
        $data->save();
        return redirect()->route('transaksi.index')->with('sukses','Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=Transaksi::find($id);
        $barang=Barang::find($data->barang_id);
        $stokbarangberkurang=$barang->jumlah_barang+1;
        // dd($stokbarangberkurang);
        $barang->update([
            'jumlah_barang'=>$stokbarangberkurang
        ]);
        $data->update(['status'=>'Dikembalikan']);
        return redirect('/admin/transaksi')->with('sukses','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Transaksi::find($id);
        $notif=Notifikasi::where('transaksi_id',$id)->delete();
        $data->delete();
        return redirect('/admin/transaksi')->with('sukses','Data Berhasil Dihapus');
    }

    public function transaksibaru()
    {
        $barang=Barang::orderBy('id','desc')->get();
        $datenow=date('Y-m-d', strtotime(now()));
        // dd($datenow);
        $anggota=User::where('role','user')->get();
        return view('transaksi.create',compact('barang','anggota','datenow'));
    }

    public function Detail($id)
    {
        $data=Transaksi::find($id);
        return view('transaksi.detail',compact('data'));
    }
}
