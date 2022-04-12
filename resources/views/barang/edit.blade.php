@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Edit Data Buku</h4>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card-body">
        <form action="{{ route('buku.update',$data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- @method('put') --}}
            {{ method_field('put') }}
            <div class="form-group">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control col-6" value="{{ $data->judul }}">
            </div>
            <div class="form-group">
                <label>IdBuku</label>
                <input type="text" name="isbn" class="form-control col-6" value="{{ $data->id }}" disabled>
            </div>
            <div class="form-group">
                <label>Pengarang</label>
                <input type="text" name="pengarang" class="form-control col-6" value="{{ $data->pengarang }}">
            </div>
            <div class="form-group">
                <label>Penerbit</label>
                <input type="text" name="penerbit" class="form-control col-6" value="{{ $data->penerbit }}">
            </div>
            <div class="form-group">
                <label>Tahun Terbit</label>
                <input type="number" name="tahun_terbit" class="form-control col-6" value="{{ $data->tahun_terbit }}">
            </div>
            <div class="form-group">
                <label>Jumlah Buku</label>
                <input type="number" name="jumlah_buku" class="form-control col-6" value="{{ $data->jumlah_buku }}">
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi"  cols="30" class="form-control col-6" rows="10">{{ $data->deskripsi }}</textarea>

            </div>
            <div class="form-group">
                <label>Lokasi</label>
                <select class="form-control col-6" name="lokasi">
                    <option value="">-Pilih-</option>
                    <option @if($data->lokasi=='Rak 1') selected @endif value="Rak 1">Rak 1</option>
                    <option @if($data->lokasi=='Rak 2') selected @endif value="Rak 2">Rak 2</option>
                    <option @if($data->lokasi=='Rak 3') selected @endif value="Rak 3">Rak 3</option>
                    <option @if($data->lokasi=='Rak 4') selected @endif value="Rak 4">Rak 4</option>
                    <option @if($data->lokasi=='Rak 5') selected @endif value="Rak 5">Rak 5</option>
                </select>
            </div>

            <div class="form-group">
                <label>Cover</label>
                <input type="file" name="cover" class="form-control col-6">
            </div>
            <a href="/{{ auth()->user()->role }}/buku" class="btn btn-warning ">Kembali</a>
            <button type="submit" class="btn btn-primary float-right">Simpan</button>
        </form>

    </div>
</div>
@endsection
