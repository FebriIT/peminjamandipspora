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
        <form action="/{{ auth()->user()->role }}/databarang/peminjaman/store" method="POST">
            @csrf
            <div class="row">
                {{-- <input type="hidden" name="id" class="form-control" value="{{ $data->id }}" required> --}}
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
                        <input type="date" name="tgl_pinjam" disabled class="form-control" value="{{ $datenow }}" required>

                    </div>

                </div>
                <div class="col-6">
                    <h4>Deskripsi Barang</h4>

                    <div class="form-group">
                        <label>Barang </label>
                        <div class="input-group mb-3">
                            <input type="hidden" class="form-control" id="barang_id" name="barang_id" placeholder="" aria-label="">
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="" aria-label="" required>
                            <div class="input-group-append">
                                <button class="btn btn-primary"  id="btnmodalbarang" type="button">Cari Barang</button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Kode Barang</label>
                        <input type="text" disabled name="kodebarang" id="kodebarang" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" disabled name="namabarang" id="namabarang" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah" class="form-control" value="">
                    </div>
                        <div class="form-group">
                        <label>Tanggal Kembali</label>
                        <input type="date" name="tgl_kembali" class="form-control" required>
                    </div>
                </div>
            </div>

            <a href="/{{ auth()->user()->role }}/barang" class="btn btn-warning ">Kembali</a>
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
                                <th scope="col">Username</th>

                                <th scope="col">Email</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anggota as $row)
                            <tr class="pilihanggota" idanggota="{{ $row->id }}" namaanggota="{{ $row->name }}" noanggota="{{ $row->no_anggota }}" nohp="{{ $row->nohp }}">
                                <th scope="row">{{ $row->no_anggota }}</th>
                                <td><a href="#"> {{ $row->name }}</a></td>
                                <th>{{ $row->username }}</th>
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


<div class="modal fade" tabindex="-1" role="dialog" id="modalBarang">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cari Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-sm table-hover" id="caribarang">
                        <thead>
                            <tr>
                                <th>Pict</th>
                                <th scope="col">Kode Barang</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">IdBarang</th>
                                <th scope="col">Merek</th>
                                <th scope="col">Jumlah Barang</th>
                                <th scope="col">Deskripsi</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang as $row1)
                            {{-- @dd($row1->judul) --}}
                            <tr class="pilihbarang" idBarang="{{ $row1->id }}" kodebarang="{{ $row1->kodebarang }}" namabarang="{{ $row1->namabarang }}" merek="{{ $row1->merek }}" jumlahbarang="{{ $row1->jumlahbarang }}" deskripsi="{{ $row1->deskripsi }}">
                                <td  class="py-1">
                                @if($row1->cover)
                                    <img src="{{asset('storage/coverbarang/'. $row1->cover)}}" alt="image"  width="70px" height="70px" class="rounded-circle mr-1" />
                                @else
                                    <img src="{{asset('storage/coverbarang/default.jpg')}}" alt="image"  width="70px" height="70px" class="rounded-circle mr-1" />
                                @endif

                                </td>
                                <td><a href="#">{{ $row1->kodebarang }}</a></td>
                                <td>{{ $row1->namabarang }}</td>
                                <td>{{ $row1->id }}</td>
                                <td>{{ $row1->merek }}</td>
                                <td>{{ $row1->jumlahbarang }}</td>
                                <td>{{ $row1->deskripsi }}</td>

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
        $('#carianggota').DataTable();
        $('#caribarang').DataTable();
        $('#btnmodalanggota').click(function(){
            $('#modalAnggota').modal('show');
            $('#carianggota').on("click",".pilihanggota",function(e){
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

        $('#btnmodalbarang').click(function(){
            $('#modalBarang').modal('show');
            $('#caribarang').on("click",".pilihbarang",function(e){

                var kodebarang=$(this).attr('kodebarang');
                var namabarang=$(this).attr('namabarang');
                var idbarang=$(this).attr('idBarang');
                var merek=$(this).attr('merek');
                var jumlahbarang=$(this).attr('jumlahbarang');
                var deskripsi=$(this).attr('deskripsi');

                $('#modalBarang').modal('hide');
                $('#judul').val(idbarang+' - '+namabarang);
                $('#idbarang').val(idbarang);
                $('#barang_id').val(idbarang);
                $('#namabarang').val(namabarang);
                $('#kodebarang').val(kodebarang);
                $('#merek').val(merek);
                $('#jumlahbarang').val(jumlahbarang);
                $('#deskripsi').val(deskripsi);

            });
        });
    });
</script>
@endsection
