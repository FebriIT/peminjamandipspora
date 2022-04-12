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
                            <td>Kode Barang</td>
                            <td>:</td>
                            <td>{{ $data->kodebarang }}</td>
                        </tr>
                        <tr>
                            <td>Nama Barang</td>
                            <td>:</td>
                            <td>{{ $data->namabarang }}</td>
                        </tr>

                        <tr>
                            <td>Merek</td>
                            <td>:</td>
                            <td>{{ $data->merek }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah Barang</td>
                            <td>:</td>
                            <td>{{ $data->jumlahbarang }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Pembelian</td>
                            <td>:</td>
                            <td>{{ $data->tglpembelian }}</td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td>:</td>
                            <td>{{ $data->deskripsi }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>

@endsection
