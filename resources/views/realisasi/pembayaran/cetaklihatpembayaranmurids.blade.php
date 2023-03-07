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
        <p style="text-align:center;"><strong>PEMBAYARAN MURID</strong><br>
    </center>
          
        <br>
        <br>
        <b> &nbsp;&nbsp; Nomor Induk : {{$pembayarans->rincian_nis}} <br>
            &nbsp;&nbsp; Nama Murid : {{$pembayarans->nama}}</b>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Tagihan</th>
                                <th>Jumlah Tagihan</th>
                                <th>Jumlah Pembayaran</th>
                                <th>Sisa Pembayaran</th>
                            </tr>
                        <tbody>
                            @foreach ($pembayaran as $item)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ $item->nama_akun}}</td>
                                <td>{{ Str::rupiah ($item->rincian_nominal)}}</td>
                                <td>{{ Str::rupiah ($item->pembayaran)}}</td>
                                <td>{{ Str::rupiah ($item->sisapembayaran)}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                            <th>Total</th>
                            <th></th>
                            <th>{{Str::rupiah($tagihan)}}</th>
                            <th>{{Str::rupiah($bayaran)}}</th>
                            <th>{{Str::rupiah($sisa)}}</th>
                            </thead>
                    </table>
                </div>
            </div>
    </div>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<input class="no-print" type="button" value="Cetak" onclick="window.print()">
<input type="button" value="Kembali" onclick=self.history.back() class="no-print">

