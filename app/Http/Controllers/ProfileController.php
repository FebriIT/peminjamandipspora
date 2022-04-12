<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $data=User::find(Auth::user()->id);
        return view('profile',compact('data'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'password' => 'required_with:password-confirm|same:password-confirm',
        ]);
        $data=User::find(Auth::user()->id);
        $data->update(['name'=>$request->name,'email'=>$request->email,'nohp'=>$request->nohp,'jk'=>$request->jk]);

        if($request->password!=null){
            $data->update(['password'=>bcrypt($request->password)]);
        }
        if ($data->avatar == null) {
            if ($request->has('avatar')) {
                $request->file('avatar')->move(public_path() . '/storage/avatar/'.$data->name, $request->file('avatar')->getClientOriginalName());
                $data->avatar = $request->file('avatar')->getClientOriginalName();
                $data->save();
            }
        } else {
            if ($request->has('avatar')) {
                //   ini untuk update profile
                unlink(public_path() . '/storage/avatar/' . $data->name . '/' . $data->avatar);

                $request->file('avatar')->move(public_path() . '/storage/avatar/' . $data->name, $request->file('avatar')->getClientOriginalName());
                $data->avatar = $request->file('avatar')->getClientOriginalName();
                $data->save();
            }
        }
        return redirect()->back()->with('sukses','Data berhasil di ubah');
    }
}
