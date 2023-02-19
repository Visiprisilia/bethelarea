<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Nomor Induk</th>
            <th>Nama Murid</th>
            <th>Total</th>
            @if (auth()->user()->level=="unit" or auth()->user()->level=="yayasan")
            <th>Aksi</th>
            @endif
        </tr>
    <tbody>
        @foreach ($tagihan as $item)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $item->daftar_nis_tagihan}}</td>
            <td>{{ $item->nama}}</td>
            <td>{{ Str::rupiah ($item->daftar_nominal_tagihan)}}</td>
            @if (auth()->user()->level=="unit" or auth()->user()->level=="yayasan")
            <td>
                <a href="/cetaklihattagihanmurid/{{$item->id_tagihan}}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">Detail</a>
                <!-- <a href="/hapustagihan/{{$item->nis_tagihan}}" onclick="return confirm('Yakin hapus data?')"><i class="fas fa-trash-alt" style="color:red"></i></a> -->
            </td>
            @endif
            <!-- <a href="/lihattagihan/{{$item->nis_tagihan}}"><i class="fas fa-eye" style="color:red"></i></a> -->
        </tr>
        @endforeach
        </tbody>
    <td>Total</td>
    <td></td>
    <td></td>
    <td>{{Str::rupiah($totals)}}</td>
    <td></td>
    </thead>
</table> 
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<input class="no-print" type="button" value="Cetak" onclick="window.print()">
<input type="button" value="Kembali" onclick=self.history.back() class="no-print">