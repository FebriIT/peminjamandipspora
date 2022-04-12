@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Transaksi Baru</h4>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/{{ auth()->user()->role }}/buku/peminjaman/store" method="POST">
            @csrf
            <div class="row">
                <input type="hidden" name="buku_id" class="form-control" value="{{ $data->id }}" required>
                <div class="col-6">
                    <h4>Data Peminjam</h4>
                    <div class="form-group">
                        <label>Anggota</label>
                        <div class="input-group mb-3">
                            <input type="hidden" class="form-control" id="user_id" name="user_id" placeholder="" aria-label="">
                            <input type="text" class="form-control" id="name" name="name" placeholder="" aria-label="">
                            <div class="input-group-append">
                                <button class="btn btn-primary"  id="btnmodalanggota" type="button">Cari Anggota</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" id="name1" class="form-control" required disabled>
                    </div>
                    <div class="form-group">
                        <label>Nomor Anggota</label>
                        <input type="number" id="no_anggota" class="form-control" required disabled>
                    </div>
                    <div class="form-group">
                        <label>No HP</label>
                        <input type="number" name="nohp" id="nohp" class="form-control" required disabled>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pinjam</label>
                        <input type="date" name="tgl_pinjam" class="form-control" required>
                    </div>

                </div>
                <div class="col-6">
                    <h4>Deskripsi Buku</h4>

                    <div class="form-group">
                        <label>Judul Buku </label>
                        <input type="text" disabled name="judul" class="form-control" value="{{ $data->judul }}">

                    </div>
                    <div class="form-group">
                        <label>IdBuku</label>
                        <input type="text" disabled name="isbn" class="form-control" value="{{ $data->isbn }}">
                    </div>
                    <div class="form-group">
                        <label>Pengarang</label>
                        <input type="text" disabled name="pengarang" class="form-control" value="{{ $data->pengarang }}">
                    </div>
                    <div class="form-group">
                        <label>Tahun Terbit</label>
                        <input type="text" disabled name="tahun_terbit" class="form-control" value="{{ $data->tahun_terbit }}">
                    </div>


                    <div class="form-group">
                        <label>Tanggal Kembali</label>
                        <input type="date" name="tgl_kembali" class="form-control" required>
                        <input type="hidden"  name="kategori_id" class="form-control" value="{{ $data->kategori_id }}">
                    </div>
                </div>
            </div>

            <a href="/{{ auth()->user()->role }}/buku" class="btn btn-warning ">Kembali</a>
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary float-right">Simpan</button>
        </form>

    </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="modalAnggota">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cari Anggota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-sm table-hover" id="carianggota">
                        <thead>
                            <tr>
                                <th scope="col">No Anggota</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anggota as $row)
                            <tr class="pilihanggota" idanggota="{{ $row->id }}" namaanggota="{{ $row->name }}" noanggota="{{ $row->no_anggota }}" nohp="{{ $row->nohp }}">
                                <th scope="row">{{ $row->no_anggota }}</th>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('#btnmodalanggota').click(function(){
            $('#modalAnggota').modal('show');
            $('.pilihanggota').click(function(e){
                var idanggota=$(this).attr('idanggota');
                var nmanggota=$(this).attr('namaanggota');
                var noanggota=$(this).attr('noanggota');
                var nohp=$(this).attr('nohp');
                $('#modalAnggota').modal('hide');
                $('#user_id').val(idanggota);
                $('#name').val(noanggota+' - '+nmanggota);
                $('#name1').val(nmanggota);
                $('#no_anggota').val(noanggota);
                $('#nohp').val(nohp);
            });
        });
    });
</script>
@endsection
