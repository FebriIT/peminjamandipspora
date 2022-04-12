@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-body">


        <section class="section">
            <img src="@if($data->avatar==null){{ asset('storage/avatar/default.png') }}@else {{ asset('storage/avatar/'.$data->name.'/'.$data->avatar) }}  @endif" style="width: 150px; height:150px; display: block;margin-left: auto;margin-right: auto; margin-bottom:50px;" alt="">
            <div class="table-responsive">

                <table class="table table-sm">

                    <tbody>
                        <tr>
                            <td>Nomor Anggota</td>
                            <td>:</td>
                            <td>{{ $data->no_anggota }}</td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>{{ $data->name }}</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>{{ $data->jk }}</td>
                        </tr>
                        <tr>
                            <td>Nomor HP</td>
                            <td>:</td>
                            <td>{{ $data->nohp }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>

@endsection
