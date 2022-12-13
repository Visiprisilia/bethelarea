<div id="wrapper">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Akun</th>
            <th>Nama Akun</th>
            <th>Anggaran</th>
            <th>Posisi Anggaran</th>
        </tr>
    <tbody>
        @foreach ($lappa as $item)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $item->akun}}</td>
            <td>{{ $item->nama_akun}}</td>
            <td>{{ Str::rupiah($item->anggaran)}}</td>
            <td>{{ Str::rupiah($item->posisi_anggaran)}}</td>
        </tr>
        @endforeach
    </tbody>
    <td>Total</td>
    <td></td>
    <td></td>
    <td>{{Str::rupiah($anggarans)}}</td>
    <td>{{Str::rupiah($posisianggarans)}}</td>
    </thead>
</table><br><br><br></div>
------------------------------------------------------------------------------------------------------------
<b>&emsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <b>Mengetahui&emsp;&nbsp;&emsp;&emsp;&emsp;&nbsp;<br><br>
<b>&emsp;Kepala Sekolah &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp; <b>Bendahara Sekolah&emsp;&nbsp;&emsp;&emsp;&emsp;<b>Bendahara Yayasan &nbsp;</b></b></b></b></b><br><br><br>
&emsp;Arum Widuri, S.Pd&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Sri Harmini&emsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Sri Harmini &nbsp;<br><br>

<br><br><br>
<input class="no-print" type="button" value="Cetak" onclick="window.print()">
<input type="button" value="Kembali" onclick=self.history.back() class="no-print">