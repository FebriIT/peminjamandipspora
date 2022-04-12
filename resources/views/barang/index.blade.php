@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-body">

        <div class="section-title">Data Barang
            @if (Auth::user()->role=='admin')

            <a href="/{{ auth()->user()->role }}/databarang/create" class="btn btn-sm btn-warning float-right">Tambah Data</a>
            @endif
        </div>
        <section class="section">
            @include('sweetalert::alert')
            <div class="table-responsive">

                <table class="table table-sm" id="datatable">
                    <thead>
                        <tr>
                            <th>Pict</th>
                            <th scope="col">Kode Barang</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Merek</th>
                            <th scope="col">Jumlah Barang</th>
                            <th scope="col">Tanggal Pembelian</th>
                            <th scope="col">Deskripsi</th>

                            @if(Auth::user()->role=='admin')
                            <th style="width: 50px">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                        <tr>
                            <td  class="py-1">
                            @if($row->cover)
                                <img src="{{asset('storage/coverbuku/'. $row->cover)}}" alt="image"  width="70px" height="70px" class="rounded-circle mr-1" />
                            @else
                                <img src="{{asset('storage/coverbuku/default.jpg')}}" alt="image"  width="70px" height="70px" class="rounded-circle mr-1" />
                            @endif

                            </td>
                            <td>{{ $row->kodebarang }}</td>

                            <td>{{ $row->namabarang }}</td>
                            <td>{{ $row->merek }}</td>
                            <td>{{ $row->jumlahbarang }}</td>
                            <td>{{ $row->tglpembelian }}</td>
                            <td>{{ $row->deskripsi }}</td>
                            @if (Auth::user()->role=='admin')
                            <td>
                                {{-- <a href="/admin/buku/{{ $row->id }}/pinjam" class="btn btn-icon btn-sm btn-primary" title="Pinjam Buku"><i class="fas fa-book"></i></a> --}}
                                <a href="/{{ auth()->user()->role }}/buku/{{ $row->id }}/edit" class="btn btn-icon btn-sm btn-warning" title="Edit Buku"><i class="far fa-edit"></i></a>
                                <form action="{{ route('databarang.destroy', $row->id) }}"  method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button onclick="return confirm('Anda yakin ingin meghapus data buku?')" title="Hapus buku" class="btn btn-icon btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>

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

@section('js')

<script>

</script>
{{-- <script src="{{ asset('sweeta') }}"></script> --}}
@endsection
