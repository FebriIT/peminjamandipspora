@extends('layouts.master')

@section('content')
<div class="card">
     <div class="card-header">
        <h4>Laporan Anggota</h4>
    </div>
    <div class="card-body">
        <form action="/admin/laporananggota/download" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Tanggal Mulai</label>
                        <input type="date" name="mulai" class="form-control" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Tanggal Akhir</label>
                        <input type="date" name="akhir" class="form-control" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>


        </form>

        {{-- <a href="/peminjaman/harian" class="btn btn-primary">Harian</a>
        <a href="/peminjaman/bulanan" class="btn btn-primary">Bulanan</a>
        <a href="/peminjaman/tahunan" class="btn btn-primary">Tahunan</a> --}}
    </div>
</div>
@endsection

