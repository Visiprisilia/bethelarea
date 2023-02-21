<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div id="print-area">
        <style type="text/css">
            table tr td,
            table tr th {
                font-size: 11pt;
            }
        </style>
        <center>
            <img align="bottom" src="{{asset('template/img/logo4.png') }}" style="max-width:100px;">
            <h6>Yayasan Bethel Area</h6>
            <h6>Sekolah KB/TK "Satria Tunas Bangsa"</h6>
            <h6>Alamat: Jl Hasanudin No.3B, Mangunsari, Kec.Sidomukti, Kota Salatiga, Jawa Tengah </h6> <br>
            <p style="text-align:center;"><strong>DATA MURID</strong><br>
        </center>
    
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Induk Siswa</th>
                            <th>Nomor Induk Siswa Nasional</th>
                            <th>Nama</th>
                            <th>Tempat Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Agama</th>
                            <th>Nama Ayah</th>
                            <th>Nama Ibu</th>
                            <th>Pekerjaan Ayah</th>
                            <th>Pekerjaan Ibu</th>
                            <th>Pendidikan Terakhir Ayah</th>
                            <th>Pendidikan Terakhir Ibu</th>
                            <th>Anak Ke Berapa</th>
                            <th>Nomor Akte Lahir</th>
                            <th>Kontak</th>
                        </tr>  
                    <tbody>
                        @foreach ($murid as $item)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $item->nomor_induk}}</td>
                            <td>{{ $item->nomor_isn}}</td>
                            <td>{{ $item->nama}}</td>
                            <td>{{ $item->ttl}}</td>
                            <td>{{ $item->jk}}</td>
                            <td>{{ $item->alamat}}</td>
                            <td>{{ $item->agama}}</td>
                            <td>{{ $item->nama_ayah}}</td>
                            <td>{{ $item->nama_ibu}}</td>
                            <td>{{ $item->pekerjaan_ayah}}</td>
                            <td>{{ $item->pekerjaan_ibu}}</td>
                            <td>{{ $item->pendidikan_ayah}}</td>
                            <td>{{ $item->pendidikan_ibu}}</td>
                            <td>{{ $item->anak_keberapa}}</td>
                            <td>{{ $item->no_akte}}</td>
                            <td>{{ $item->kontak}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    </thead>
                </table>
<br><br><br><br><br><br><br><br>
				<input class="no-print" type="button" value="Cetak" onclick="window.print()">
<input type="button" value="Kembali" onclick=self.history.back() class="no-print">



