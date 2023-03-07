<style type="text/css" media="all">
    @media print {
        .no-print {
            display: none;
        }
    }
</style>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Nomor Induk</th>
            <th>Nama Murid</th>
            <!-- <th>Total Tagihan</th>
                            <th>Total Pembayaran</th>
                            <th>Total Sisa Pembayaran</th> -->
            @if (auth()->user()->level=="unit" or auth()->user()->level=="yayasan")
            <th>Aksi</th>
            @endif
        </tr>
    <tbody>
        @foreach ($pembayaran as $item)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $item->rincian_nis}}</td>
            <td>{{ $item->nama}}</td>
            <!-- <td>{{ Str::rupiah ($item->rincian_nominal)}}</td>
                            <td>{{ Str::rupiah ($item->pembayaran)}}</td>
                            <td>{{ Str::rupiah ($item->sisapembayaran)}}</td> -->
            @if (auth()->user()->level=="unit" or auth()->user()->level=="yayasan")

            <td>
                <a href="/cetaklihatpembayaranmurid/{{$item->rincian_id}}" class="no-print" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">Detail</a>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
    </thead>
</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<input class="no-print" type="button" value="Cetak" onclick="window.print()">
<input type="button" value="Kembali" onclick=self.history.back() class="no-print">