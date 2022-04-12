<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\User;


class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Anggota::orderBy('id','desc')->get();
        return view('anggota.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $anggota=Anggota::all();
        $data=User::where('role','user')->get();

        return view('anggota.tambah',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'no_anggota' => 'required|max:5|unique:users,no_anggota',
    //         'username'=>'required|max:5|unique:users,username'
    //     ]);
    //     dd($request->all());

    //     $data=Anggota::create($request->all());
    //     return redirect('/admin/anggota')->with('sukses','Data Berhasil Ditambahkan');
    // }

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
        $data=Anggota::find($id);
        return view('anggota.edit',compact('data'));
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
        Anggota::find($id)->update($request->all());

        return redirect()->to('admin/anggota')->with('sukses','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Anggota::find($id)->delete();
        return redirect()->route('anggota.index')->with('sukses','Data Berhasil Dihapus');
    }

    public function detail($no_anggota)
    {
        $data=User::where('no_anggota',$no_anggota)->first();
        return view('user.detail',compact('data'));
    }
}
