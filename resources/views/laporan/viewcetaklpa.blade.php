<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<table class="table table-bordered" id="dataTable">
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
            <td>{{ $item->nama}}</td>
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
</table>
<!-- ------------------------------------------------------------------------------------------------------------
&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;<b> Salatiga,</b> {{$tanggalhariini}} &nbsp;<br><br>
<b>&emsp;&nbsp;&nbsp;&nbsp;&nbsp;Membuat&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;Menyetujui&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp; <b>Mengetahui&emsp;&nbsp;&emsp;&emsp;&emsp;&nbsp;</b></b></b><br/>
        <b>Bagian Administrasi &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp; <b>Kepala Sekolah&emsp;&nbsp;&emsp;&emsp;&emsp;<b>Bendahara Yayasan &nbsp;</b></b></b></b></b><br><br><br><br>
Astrid Wulan Dessianti, S.Pd&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;Arum Widuri, S.Pd&emsp;&nbsp;&emsp;&emsp;Neny Widijawati, S.Pd&nbsp;<br><br> -->
<center>
    &emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<b> Salatiga,</b> {{$tanggalhariini}} &nbsp;<br><br>
    <b>&emsp;&nbsp;&nbsp;&emsp;Membuat&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Menyetujui&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<b>Mengetahui&emsp;&nbsp;&emsp;&emsp;&emsp;&nbsp;</b></b></b><br/>
    <b>&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bagian Administrasi&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Kepala Sekolah&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<b>Bendahara Yayasan&emsp;&nbsp;&emsp;&emsp;&emsp;&nbsp;&emsp;</b></b></b><br/><br><br><br>
    &emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Astrid Wulan Dessianti, S.Pd&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;Arum Widuri, S.Pd&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Neny Widijawati, S.Pd&emsp;&nbsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;<br/><br><br><br>
</center>
<br><br><br>
<input class="no-print" type="button" value="Cetak" onclick="window.print()">
<input type="button" value="Kembali" onclick=self.history.back() class="no-print">