<table class="" id="" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th></th>
            <th></th>
        </tr>
    <tbody>
        <td><b>Pendapatan</b></td>
        @foreach ($pendapatan as $item)
        <tr>
            <td>{{ $item->nama_akun}}</td>
            <td>{{Str::rupiah ($item->realisasi)}}</td>
        </tr>
        @endforeach
    </tbody>
    <td><b>Total Pendapatan</b></td>
    <th></th>
    <th></th>
    <td><b>{{Str::rupiah($totalpendap)}}</b></td>
    <tbody>
    <td><b>Biaya</b></td>
        @foreach ($biaya as $item)
        <tr>
            <td>{{ $item->nama_akun}}</td>
            <td>{{Str::rupiah ($item->realisasi)}}</td>
        </tr>
        @endforeach
    </tbody>
    <td><b>Total Biaya</b></td>
    <th></th>
    <th></th>
    <td><b>{{Str::rupiah($totalbiaya)}}</b></td>
    <tbody>
        <td><b>Surplus(Defisit)</b></td>
        <th></th>
        <th></th>  
        <td><b>{{Str::rupiah($total)}}</b></td>
    </tbody>
    </thead>
    </table><br><br><br></div>
    ------------------------------------------------------------------------------------------------------------
    &emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;<b> Salatiga,</b> {{$tanggalhariini}} &nbsp;<br><br>
<b>&emsp;&nbsp;&nbsp;&nbsp;&nbsp;Membuat&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;Menyetujui&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp; <b>Mengetahui&emsp;&nbsp;&emsp;&emsp;&emsp;&nbsp;</b></b></b><br/>
        <b>Bagian Administrasi &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp; <b>Kepala Sekolah&emsp;&nbsp;&emsp;&emsp;&emsp;<b>Bendahara Yayasan &nbsp;</b></b></b></b></b><br><br><br><br>
Astrid Wulan Dessianti, S.Pd&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;Arum Widuri, S.Pd&emsp;&nbsp;&emsp;&emsp;Neny Widijawati, S.Pd&nbsp;<br><br>

<br><br><br>
<input class="no-print" type="button" value="Cetak" onclick="window.print()">
<input type="button" value="Kembali" onclick=self.history.back() class="no-print">