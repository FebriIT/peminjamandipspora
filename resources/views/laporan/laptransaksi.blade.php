<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>

    </style>

</head>

<body>

    <div class="container">
        <div>
            <h3><center>Laporan Transaksi Dari Tanggal {{ $mulai }} sampai {{ $akhir }}</center></h3>
            <table style="width: 100%;text-align: center;" border="1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Peminjam</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Dibuat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($p as $key=>$row)
                        <tr>

                            <td>{{ ++$key }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->kodebarang }}</td>
                            <td>{{ $row->namabarang }}</td>
                            <td>{{ $row->tgl_pinjam }}</td>
                            <td>{{ $row->tgl_kembali }}</td>
                            <td>{{ $row->status }}</td>
                            <td>{{ $row->created_at }}</td>


                        </tr>
                    @endforeach


                </tbody>
            </table>
            <br>
            {{-- <table style="width: 100%;text-align: center;border-style: none;">
                <tr>
                    <td>
                        Mengetahui, <br>
                    Kepala Sekolah <br>
                    <br><br><br>
                    ERWANCAN, S.Pd <br>
                    NIP. 196704021992031005
                    </td>
                    <td>
                        Jambi, {{ $tglskrng }} <br>
                    Kepala DISPORA <br>
                    <br><br><br><br>
                    LENI SRI WAHYUNI, S.Pd <br>
                    NIP. 197609062009022001
                    </td>
                </tr>
            </table> --}}
        </div>
    </div>


</body>

</html>
