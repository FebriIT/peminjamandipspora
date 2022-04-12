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
            <h3><center>Laporan Anggota Dari Tanggal {{ $mulai }} sampai {{ $akhir }}</center></h3>
            <table style="width: 100%;text-align: center;" border="1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Anggota</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>No HP</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Dibuat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($p as $key=>$row)
                        <tr>

                            <td>{{ ++$key }}</td>
                            <td>{{ $row->no_anggota }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->jk }}</td>
                            <td>{{ $row->nohp }}</td>
                            <td>{{ $row->username }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->role }}</td>
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
                    Kepala Dispora <br>
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
