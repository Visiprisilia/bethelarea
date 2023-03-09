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
                            <th>No.Bukti</th>
                            <th>Periode</th>
                            <th>Tanggal Pencatatan</th>
                            <th>Keterangan</th>
                            <!-- <th>Akun</th> -->
                            <!-- <th>Sumber</th> -->
                            <th>Jumlah</th>                              
                            <!-- <th>Diterima Dari</th>     -->                        
                        </tr>
                    <tbody>
                        @foreach ($kasmasuk as $item)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $item->no_bukti}}</td>
                            <td>{{ $item->periode}}</td>
                            <td>{{ $item->tanggal_pencatatan}}</td>
                            <td>{{ $item->keterangan}}</td>
                            <!-- <td>{{ $item->akun}}</td>                             -->
                            <!-- <td>{{ $item->nama_sumber}}</td>                             -->
                            <td>{{Str::rupiah ($item->jumlah)}}</td>                              
                            <!-- <td>{{ $item->nama}}</td>                               -->
                      
                        </tr>
                        @endforeach
                    </tbody>
                    </thead>
                </table>
               
                <input class="no-print" type="button" value="Cetak" onclick="window.print()">
<input type="button" value="Kembali" onclick=self.history.back() class="no-print">