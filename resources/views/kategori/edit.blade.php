@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Edit Kategori</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('kategori.update',$data->id) }}" method="POST">
            @csrf
            {{-- @method('put') --}}
            {{ method_field('put') }}
            <div class="form-group">
                <label>nama</label>
                <input type="text" name="nama" class="form-control col-6" value="{{ $data->nama }}">
            </div>
            
            <a href="/{{ auth()->user()->role }}/kategori" class="btn btn-warning ">Kembali</a>
            <button type="submit" class="btn btn-primary float-right">Simpan</button>
        </form>

    </div>
</div>
@endsection
