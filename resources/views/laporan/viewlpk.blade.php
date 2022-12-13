<p style="text-align:center;"><strong>LAPORAN PENGHASILAN KOMPREHENSIF</strong><br></p>
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
    <th>{{Str::rupiah ($totalpendap)}}</th>
   
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
        <th>Surplus(Defisit)</th>
        <th></th>
        <th></th>
        <th>{{Str::rupiah($total)}}</th>
    </tbody>
    </thead>
</table>