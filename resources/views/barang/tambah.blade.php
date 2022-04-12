@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Tambah Buku</h4>
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
        <form action="{{ route('databarang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Kode Barang</label>
                <input type="text" name="kodebarang" class="form-control col-6" required>
            </div>
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="namabarang" class="form-control col-6"  required>
            </div>

            <div class="form-group">
                <label>Merek</label>
                <input type="text" name="merek" class="form-control col-6" required>
            </div>
            <div class="form-group">
                <label>Jumlah Barang</label>
                <input type="number" name="jumlahbarang" class="form-control col-6" required>
            </div>
            <div class="form-group">
                <label>Tanggal Pembelian</label>
                <input type="date" name="tglpembelian" class="form-control col-6" required>
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi"  cols="30" class="form-control col-6" rows="10" required></textarea>
            </div>


            <div class="form-group">
                <label>Cover</label>
                <input type="file" name="cover" class="form-control col-6" required>
            </div>

            <a href="/{{ auth()->user()->role }}/databarang" class="btn btn-warning ">Kembali</a>
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary float-right">Simpan</button>
        </form>

    </div>
</div>
@endsection
