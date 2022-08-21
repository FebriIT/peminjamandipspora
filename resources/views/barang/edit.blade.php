@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Edit Data Barang</h4>
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
        <form action="{{ route('databarang.update',$data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- @method('put') --}}
            {{ method_field('put') }}
            
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="namabarang" class="form-control col-6" value="{{ $data->namabarang }}" required>
            </div>

            <div class="form-group">
                <label>Merek</label>
                <input type="text" name="merek" class="form-control col-6" value="{{ $data->merek }}" required>
            </div>
            <div class="form-group">
                <label>Jumlah Barang</label>
                <input type="number" name="jumlahbarang" class="form-control col-6" value="{{ $data->jumlahbarang }}" required>
            </div>
            <div class="form-group">
                <label>Tanggal Pembelian</label>
                <input type="date" name="tglpembelian" class="form-control col-6" value="{{ $data->tglpembelian }}" required>
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi"  cols="30" class="form-control col-6" rows="10"  required>{{ $data->deskripsi }}</textarea>
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
