
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Nomor Induk</th>
            <th>Nama Murid</th>
            <!-- <th>Total Tagihan</th>
                            <th>Total Pembayaran</th>
                            <th>Total Sisa Pembayaran</th> -->
          
            <th>Aksi</th>
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

            <td>
                <a href="/cetaklihatpembayaranmurids/{{$item->rincian_id}}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">Detail</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    </thead>
</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<input class="no-print" type="button" value="Cetak" onclick="window.print()">
<input type="button" value="Kembali" onclick=self.history.back() class="no-print">