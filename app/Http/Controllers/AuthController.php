<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function proses_login(Request $request)
    {

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            if (auth()->user()->role == 'admin') {
                $transaksi=DB::table('transaksi')->whereNotExists(function($query){
                    $query->select(DB::raw(1))
                    ->from('notifikasi')
                    ->whereColumn('transaksi.id','notifikasi.transaksi_id');
                })
                ->get();


                foreach($transaksi as $row){

                        $data=new Notifikasi;
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


                // dd($row);


                }


                    return redirect(route('dashboard.admin'));
            } elseif (auth()->user()->role == 'user') {

                 $transaksi=Transaksi::where('status','Terlambat')->get();
                $transaksi=DB::table('transaksi')->whereNotExists(function($query){
                    $query->select(DB::raw(1))
                    ->from('notifikasi')
                    ->whereColumn('transaksi.id','notifikasi.transaksi_id');
                })
                ->get();


                foreach($transaksi as $row){

                        $data=new Notifikasi;
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


                // dd($row);


                }


                return redirect('/user/dashboard');
            }
        } else {
            return redirect('/')->with('error','');
        }


        return redirect()->back()->with('sukses','gagal');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function proses_register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'username'=>'required|unique:users,username',
            'email' => 'required|email|unique:users',
            'password' => 'required_with:password-confirm|same:password-confirm',
            'password-confirm' => 'required'
        ]);
        User::create([
            'name' => $request->name,
            'username'=>$request->username,
            'email' => $request->email,
            'role'=>'user',
            'password' => bcrypt($request->password)
        ]);
        // dd($request->all());

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            if (auth()->user()->role == 'admin') {
                // dd(auth()->user()->role);
                return redirect(route('dashboard.admin'));
            } elseif (auth()->user()->role == 'user') {
                return redirect(route('dashboard.user'));
            }
        } else {
            return redirect('/')->with('error','');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


}
