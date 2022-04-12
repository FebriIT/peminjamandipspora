@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Edit User</h4>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('user.update',$data->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>No Anggota</label>
                        <input type="text" name="no_anggota" disabled class="form-control" value="{{ $data->no_anggota }}">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ $data->name }}">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="jk" required>
                            <option value="">-Pilih-</option>
                            <option @if($data->jk=='Laki-Laki') selected @endif value="Laki-Laki">Laki-Laki</option>
                            <option @if($data->jk=='Perempuan') selected @endif value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nomor HP</label>
                        <input type="number" name="nohp" class="form-control" required value="{{ $data->nohp }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" disabled class="form-control" value="{{ $data->email }}">
                    </div>
                    <div class="form-group">
                        <label>Role</label>

                        <select class="form-control" required disabled>
                            <option @if($data->akses=='siswa') selected @endif value="siswa">Siswa</option>
                            <option @if($data->akses=='guru') selected @endif value="guru">Guru</option>
                            <option @if($data->role=='admin') selected @endif value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" disabled class="form-control" value="{{ $data->username }}" disabled>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>
            </div>
            {{-- {{ method_field('put') }} --}}

            <a href="/{{ auth()->user()->role }}/anggota" class="btn btn-warning ">Kembali</a>
            <button type="submit" class="btn btn-primary float-right">Simpan</button>
        </form>
    </div>
</div>
@endsection
