<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Uraian</th>
                        <th>Bertambah</th>
                        <th>Berkurang</th>
                        <th>Saldo</th>
                    </tr>
                <tbody>
                    @foreach ($bbkas as $item)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $item->kode}}</td>
                        <td>{{ $item->keterangan}}</td>
                        <td>{{Str::rupiah ($item->bertambah)}}</td>
                        <td>{{Str::rupiah ($item->berkurang)}}</td>
                        <td>{{Str::rupiah($saldo = $saldo + $item->bertambah - $item->berkurang)}}</td>
                    </tr>
                    @endforeach
                </tbody>
                
                </thead>
            </table>