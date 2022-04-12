<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Notifikasi;

class NotifikasiController extends Controller
{
    public function marknotif()
    {
        Notifikasi::where('sendto',auth()->user()->id)->update(array('status'=>1));
        return redirect()->back();
    }
    public function viewall()
    {
        if(auth()->user()->role=='admin'){
            $data=Notifikasi::orderBy('id','desc')->get();
        }else{
            $data=Notifikasi::where('user_id',auth()->user()->id)->orderBy('id','desc')->get();
        }

        return view('notifikasi.viewall',compact('data'));
    }
    public function viewnotif($id)
    {
        Notifikasi::find($id)->update([
            'status'=>1
        ]);
        return redirect('/'.auth()->user()->role.'/transaksi');
    }


}
