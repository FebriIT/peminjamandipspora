@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="section-title">Transaksi
            @if (Auth::user()->role=='admin')

            <a href="/{{ auth()->user()->role }}/transaksi/create" class="btn btn-sm btn-warning float-right">Transaksi Baru</a>
            @endif
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">

        {{-- <div class="section-title">Transaksi Siswa

        </div> --}}
        <section class="section">

            <div class="table-responsive">

                <table class="table table-sm" id="transaksisiswa">
                    <thead>
                        <tr>
                            {{-- <th>ID Transaksi</th> --}}
                            <th scope="col">Nomor Anggota</th>
                            <th scope="col">Peminjam</th>
                            <th scope="col">ID Barang</th>
                            <th scope="col">Tgl Pinjam</th>
                            <th scope="col">Tgl Kembali</th>
                            <th scope="col">Status</th>
                            @if (Auth::user()->role=='admin')
                            <th scope="col">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $row)

                        <tr>
                            {{-- <td>{{ $row->id }}</td> --}}
                            <th scope="row"><a href="/{{ Auth::user()->role }}/anggota/{{ $row->user->no_anggota }}/detail">{{ $row->user->no_anggota }}</a> </th>
                            <td>{{ $row->user->name }}</td>
                            <td><a href="/{{ Auth::user()->role }}/databarang/{{ $row->barang_id }}/detail">{{ $row->barang_id }}</a></td>
                            <td>{{ $row->tgl_pinjam }}</td>
                            <td>{{ $row->tgl_kembali }}</td>
                            @if ($row->status=='Dikembalikan')
                            <td><span class="badge badge-success">{{ $row->status }}</span></td>
                            @elseif($row->status=='Dipinjam')
                            <td><span class="badge badge-primary">{{ $row->status }}</span></td>
                            @elseif($row->status=='Terlambat')
                            <td><span class="badge badge-danger">{{ $row->status }}</span></td>
                            @endif
                            @if (Auth::user()->role=='admin')
                            <td>
                                <div class="btn-group mb-2">
                                    <button class="btn btn-info btn-sm dropdown-toggle" type="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu" x-placement="bottom-start"
                                        style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 29px, 0px);">
                                        @if ($row->status!='Kembali')
                                        <a href="/admin/transaksi/{{ $row->id }}/update"
                                            class="dropdown-item btn-sm">Dikembalikan</a>
                                        @endif


                                        <a href="/admin/transaksi/{{ $row->id }}/destroy" class="dropdown-item btn-sm"
                                            onclick="return confirm('Anda yakin ingin menghapus data ini?')">Delete</a>


                                    </div>
                                </div>
                            </td>
                            @endif



                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>


@endsection
