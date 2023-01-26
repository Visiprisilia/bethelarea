<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
    <tr>
        <th>No</th>
        <th>Kode Program Kerja</th>
        <th>Periode</th>
        <th>Nama Program Kerja</th>
        <th>Penanggung Jawab</th>
        <th>Waktu Mulai</th>
        <th>Waktu Selesai</th>
        <th>Tujuan</th>
        <th>Indikator Pencapaian</th>
        <th>Jumlah</th>
        <th>Keterangan</th>
        <th>Status</th>
        <th>Catatan</th>
    </tr>
<tbody>
    @foreach ($programkerja as $item)
    <tr>
        <td>{{ $loop->iteration}}</td>
        <td>{{ $item->kode_proker}}</td>
        <td>{{ $item->periode}}</td>
        <td>{{ $item->nama_proker}}</td>
        <td>{{ $item->penanggungjawab}}</td>
        <td>{{ $item->waktu_mulai}}</td>
        <td>{{ $item->waktu_selesai}}</td>
        <td>{{ $item->tujuan}}</td>
        <td>{{ $item->indikator}}</td>
        <td>{{Str::rupiah ($item->anggaran)}}</td>
        <td>{{ $item->keterangan_proker}}</td>
        <td>{{ $item->status_proker}}</td>
        <td>{{ $item->catatan}}</td>
       
    </tr>
    @endforeach
</tbody>
</thead>
</table><br><br><br><br>

<input class="no-print" type="button" value="Cetak" onclick="window.print()">
<input type="button" value="Kembali" onclick=self.history.back() class="no-print">