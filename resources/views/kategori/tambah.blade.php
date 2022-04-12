@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Tambah Kategori</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" name="nama" class="form-control col-6">
            </div>



            <a href="/{{ auth()->user()->role }}/kategori" class="btn btn-warning ">Kembali</a>
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary float-right">Simpan</button>
        </form>

    </div>
</div>
@endsection
