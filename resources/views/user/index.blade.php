@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="section-title">Anggota <a href="/{{ auth()->user()->role }}/anggota/create"
                        class="btn btn-sm btn-warning float-right">Tambah Data</a></div>
                <section class="section">

                    <div class="table-responsive">

                        <table class="table table-sm" id="datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No Anggota</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Created At</th>

                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $row)

                                <tr>
                                    <td>{{ $row->no_anggota }}</td>
                                    <td>{{ $row->username }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->created_at }}</td>

                                    <td>
                                        <a href="/{{ auth()->user()->role }}/anggota/{{ $row->id }}/edit"
                                            class="btn btn-icon btn-sm btn-warning"><i class="far fa-edit"></i></a>
                                        <a href="/admin/anggota/{{ $row->id }}/destroy"
                                            onclick="return confirm('Anda yakin ingin menghapus data ini?')"
                                            class="btn btn-icon btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </div>

</div>

@endsection
