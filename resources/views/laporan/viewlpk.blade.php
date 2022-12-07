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
            <td>{{ $item->realisasi}}</td>
        </tr>
        @endforeach
    </tbody>
    <th>Total Pendapatan</th>
    <th></th>
    <th></th>
    <th>{{$totalpendap}}</th>
    <tbody>
        <th>Biaya</th>
        @foreach ($biaya as $item)
        <tr>
            <td>{{ $item->nama_akun}}</td>
            <td>{{ $item->realisasi}}</td>
        </tr>
        @endforeach
    </tbody>
    <th>Total Biaya</th>
    <th></th>
    <th></th>
    <th>{{$totalbiaya}}</th>
    <tbody>
        <th>Surplus/Devisit</th>
        <th></th>
        <th></th>
        <th>{{$total}}</th>
    </tbody>
    </thead>
</table>