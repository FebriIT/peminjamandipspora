@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-body">


        <section class="section">
            <a href="{{ asset('storage/coverbuku/'.$data->cover) }}" target="_blank"><img src="@if($data->cover==null){{ asset('storage/avatar/default.png') }}@else {{ asset('storage/coverbuku/'.$data->cover) }}  @endif" style="width: 150px; height:150px; display: block;margin-left: auto;margin-right: auto; margin-bottom:50px;" alt=""></a>
            <div class="table-responsive">

                <table class="table table-sm">

                    <tbody>
                        <tr>
                            <td>Judul</td>
                            <td>:</td>
                            <td>{{ $data->judul }}</td>
                        </tr>
                        <tr>
                            <td>ISBN</td>
                            <td>:</td>
                            <td>{{ $data->isbn }}</td>
                        </tr>

                        <tr>
                            <td>Pengarang</td>
                            <td>:</td>
                            <td>{{ $data->pengarang }}</td>
                        </tr>
                        <tr>
                            <td>Penerbit</td>
                            <td>:</td>
                            <td>{{ $data->penerbit }}</td>
                        </tr>
                        <tr>
                            <td>Tahun Terbit</td>
                            <td>:</td>
                            <td>{{ $data->tahun_terbit }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah Buku</td>
                            <td>:</td>
                            <td>{{ $data->jumlah_buku }}</td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td>:</td>
                            <td>{{ $data->deskripsi }}</td>
                        </tr>
                        <tr>
                            <td>Lokasi</td>
                            <td>:</td>
                            <td>{{ $data->lokasi }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>

@endsection
