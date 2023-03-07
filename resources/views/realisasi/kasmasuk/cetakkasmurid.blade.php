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
            <p style="text-align:center;"><strong>REKAPAN KAS MASUK MURID</strong><br>
        </center>
        <!-- <select class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" id="rekap" name="rekap">
                <option value>Pilih Sumber</option>
                @foreach ($sumber as $item)
                <option value="{{ $item->id_sumber}}">{{$item->nama_sumber}}</option>
                @endforeach
            </select> -->
        <div id="print-area">
            <form action="/filter" method="post">                                         
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="container-fluid">
                            <div class="form-group row">
                                <label for="date" class="col-form-label col-sm-2">Mulai tanggal</label>
                                <div class="col-sm-3">
                                    <input type="date" class="form-control input-sm" id="tgl_mulai" name="tgl_mulai" required />
                                </div>
                                <label for="date" class="col-form-label col-sm-2">Selesai tanggal</label>
                                <div class="col-sm-3">
                                    <input type="date" class="form-control input-sm" id="tgl_selesai" name="tgl_selesai" required />
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" name="filter" title="filter" class="btn btn-success">Filter</button>
                                </div>
                            </div>
                        </div>
                    </div>
            <br>

            <!-- Periode : <select class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" id="laporankas" require name="laporankas"> -->
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No.Bukti</th>
                        <th>Periode</th>
                        <th>Tanggal Pencatatan</th>
                        <th>Nama Murid</th>
                        <th>Keterangan</th>
                        <!-- <th>Akun</th> -->
                        <!-- <th>Sumber</th> -->
                        <th>Jumlah</th>
                        <th>Status</th>
                    </tr>
                <tbody>
                    @foreach ($kasmasuk as $item)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $item->no_bukti}}</td>
                        <td>{{ $item->periode}}</td>
                        <td>{{ $item->tanggal_pencatatan}}</td>
                        <td>{{ $item->nama}}</td>
                        <td>{{ $item->keterangan}}</td>
                        <!-- <td>{{ $item->akun}}</td>                             -->
                        <!-- <td>{{ $item->nama_sumber}}</td>                             -->
                        <td>{{Str::rupiah ($item->jumlah)}}</td>
                        <td>{{ $item->status_setoran}}</td>                            

                    </tr>
                    @endforeach
                </tbody>
                <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Total</th>
                    <th>{{Str::rupiah ($jumlahs)}}</th>
                </thead>
            </table>

            <div style="clear:both;"></div>
        </div>
    </div>
<br>
<br>


<center>
    &emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<b> Salatiga,</b> {{$tanggalhariini}} &nbsp;<br><br>
    <b>&emsp;&nbsp;&nbsp;&emsp;Membuat&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Menyetujui&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<b>Mengetahui&emsp;&nbsp;&emsp;&emsp;&emsp;&nbsp;</b></b></b><br />
    <b>&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bagian Administrasi&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Kepala Sekolah&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<b>Bendahara Yayasan&emsp;&nbsp;&emsp;&emsp;&emsp;&nbsp;&emsp;</b></b></b><br /><br><br><br>
    &emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$ttd->bagian_administrasi ?? '' }}&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;{{$ttd->kepala_sekolah ?? '' }}&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;{{$ttd->bendahara_yayasan ?? '' }}&emsp;&nbsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;<br /><br><br><br>
</center>
    <span class="pull-right col-xs-12">
        <input class="no-print" type="button" value="Cetak" onclick="window.print()">
        <!-- <input type="button" value="Kembali" onclick=self.history.back() class="no-print"> -->
        <!-- <button type="submit" class="btn btn-success">Cetak</button> -->
        <a href="{{url('/kasmasuk')}}" class="btn">Kembali</a>

        <div style="clear:both;"></div>
        </div>
    </span>
    </form> 
