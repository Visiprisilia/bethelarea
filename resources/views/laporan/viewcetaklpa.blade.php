<table class="table align-items-center table-flush">
    <thead class="thead-light">
        <tr>
            <th class="text-center" style="width: 20%; border-bottom: 2px solid #ddd;">No</th>
            <th class="text-center" style="width: 20%; border-bottom: 2px solid #ddd;">Kode Akun</th>
            <th class="text-center" style="width: 50%; border-bottom: 2px solid #ddd;">Nama Akun</th>
            <th class="text-center" style="width: 50%; border-bottom: 2px solid #ddd;">Anggaran</th>
            <th class="text-center" style="width: 50%; border-bottom: 2px solid #ddd;">Posisi Anggaran</th>
        </tr>
    <tbody>
        @foreach ($lappa as $item)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $item->kode_akun}}</td>
            <td>{{ $item->nama_akun}}</td>
            <td>{{ $item->anggaran}}</td>
            <td>{{ $item->posisi_anggaran}}</td>
        </tr>
        @endforeach
    </tbody>
    </thead>
    </tbody>
</table><br><br><br><br><br>
<input class="no-print" type="button" value="Cetak" onclick="window.print()">
<input type="button" value="Kembali" onclick=self.history.back() class="no-print">