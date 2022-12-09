<table class="" id="" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th></th>
            <th></th>
        </tr>
    <tbody>
        <th>Pendapatan</th>
        @foreach ($pendapatan as $item)
        <tr>
            <td>{{ $item->nama_akun}}</td>
            <td>{{Str::rupiah ($item->realisasi)}}</td>
        </tr>
        @endforeach
    </tbody>
    <th>Total Pendapatan</th>
    <th></th>
    <th></th>
    <th>{{Str::rupiah($totalpendap)}}</th>
    <tbody>
        <th>Biaya</th>
        @foreach ($biaya as $item)
        <tr>
            <td>{{ $item->nama_akun}}</td>
            <td>{{Str::rupiah ($item->realisasi)}}</td>
        </tr>
        @endforeach
    </tbody>
    <th>Total Biaya</th>
    <th></th>
    <th></th>
    <th>{{Str::rupiah($totalbiaya)}}</th>
    <tbody>
        <th>Surplus/Devisit</th>
        <th></th>
        <th></th>
        <th>{{Str::rupiah($total)}}</th>
    </tbody>
    </thead>
</table><br><br><br>
<input class="no-print" type="button" value="Cetak" onclick="window.print()">
<input type="button" value="Kembali" onclick=self.history.back() class="no-print">