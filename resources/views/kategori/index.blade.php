@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-body">

        <div class="section-title">Kategori
            <a href="/{{ auth()->user()->role }}/kategori/create" class="btn btn-sm btn-warning float-right">Tambah Data</a>
        </div>
        <section class="section">
            @include('sweetalert::alert')
            <div class="table-responsive">
                <table class="table table-sm" id="datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th scope="col">Nama</th>

                            <th style="width: 50px">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key=>$row)
                        <tr>

                            <td>{{ ++$key }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>
                                <a href="/{{ auth()->user()->role }}/kategori/{{ $row->id }}/edit" class="btn btn-icon btn-sm btn-warning" title="Edit Buku"><i class="far fa-edit"></i></a>
                                <a href="/{{ auth()->user()->role }}/kategori/{{ $row->id }}/destroy" onclick="return confirm('Warning!! Data yang berkaitan dengan kategori ini akan ikut terhapus, apa anda yakin ?')" class="btn btn-icon btn-sm btn-danger" title="Edit Buku"><i class="fas fa-trash"></i></a>
                            </td>

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
