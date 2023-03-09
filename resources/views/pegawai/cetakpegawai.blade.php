<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style type="text/css" media="all">
    @media print {
        .no-print {
            display: none;
        }
    }
</style>


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
            <p style="text-align:center;"><strong>DATA PEGAWAI</strong><br>
        </center>
    
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Induk Yayasan</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Agama</th>
                            <th>Alamat</th>
                            <th>Jabatan</th>
                            <th>Pendidikan Terakhir</th>
                            <th>Penempatan</th>
                            <th>Tanggal Masuk</th>
                            <th>Status Kepegawaian</th>
                            <th>Tanggal Penetapan Pegawai Tetap</th>
                            <!-- <th>Foto Pegawai</th>
                            <th>File KTP</th>
                            <th>Surat Keterangan</th> -->
                            <th>Status</th>
                            <th>Tanggal Keluar</th>
                            <!-- <th>Keterangan</th> -->
                            <!-- <th>Tanggal Update</th> -->
                        </tr>
                    <tbody>
                        @foreach ($pegawai as $item)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $item->niy}}</td>
                            <td>{{ $item->nama}}</td>
                            <td>{{ $item->tempat_lahir}}</td>
                            <td>{{ $item->ttl}}</td>
                            <td>{{ $item->agama}}</td>
                            <td>{{ $item->alamat}}</td>
                            <td>{{ $item->jabatan}}</td>
                            <td>{{ $item->pendidikan}}</td>
                            <td>{{ $item->penempatan}}</td>
                            <td>{{ $item->tanggal_masuk}}</td>
                            <td>{{ $item->status_kepegawaian}}</td>
                            <td>{{ $item->tanggal_ppt}}</td>
                            <td>{{ $item->status}}</td>
                            <td>{{ $item->tanggal_terminasi}}</td>
                            <!-- <td>{{ $item->keterangan_pegawai}}</td> -->
                            <!-- <td>{{ $item->updated_at}}</td> -->
                        </tr>
                        @endforeach
                    </tbody>
                    </thead>
                </table>
<br><br><br><br><br><br><br><br>
				<input class="no-print" type="button" value="Cetak" onclick="window.print()">
<input type="button" value="Kembali" onclick=self.history.back() class="no-print">
    </div>


