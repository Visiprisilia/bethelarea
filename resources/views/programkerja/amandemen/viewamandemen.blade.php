<table class="table table-bordered" id="tableamandemen" width="100%" cellspacing="0">
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
        @if (auth()->user()->level=="unit")
        <th>Aksi</th> 
        @endif
        @if (auth()->user()->level=="yayasan")
        <th>Konfirmasi</th> 
        @endif
    </tr>
<tbody>
    @foreach ($amandemen as $item)
    <tr>
        <td>{{ $loop->iteration}}</td>
        <td>{{ $item->kode_proker}}</td>
        <td>{{ $item->periode}}</td>
        <td>{{ $item->nama_proker}}</td>
        <td>{{ $item->nama}}</td>
        <td>{{ $item->waktu_mulai}}</td>
        <td>{{ $item->waktu_selesai}}</td>
        <td>{{ $item->tujuan}}</td>
        <td>{{ $item->indikator}}</td>
        <td>{{Str::rupiah ($item->anggaran_amandemen)}}</td>
        <td>{{ $item->keterangan_amandemen}}</td>
        <td>{{ $item->status_amandemen}}</td>
        <td>{{ $item->catatan_amandemen}}</td>
        @if (auth()->user()->level=="unit")
       <td>
            <a href="/editamandemen/{{$item->kode_prokeramandemen}}"><i class="fas fa-edit" style="color:green"></i></a> |
            <a href="/hapusamandemen/{{$item->kode_prokeramandemen}}"onclick="return confirm('Yakin hapus data?')"><i class="fas fa-trash-alt" style="color:red"></i></a>
            <!-- <a href="#" id="prok" data-id="{{$item->kode_proker}}" ><i class="fas fa-trash-alt" style="color:red"></i></a>
            <a href="/lihatprogramkerja/{{$item->kode_proker}}"><i class="fas fa-eye" style="color:red"></i></a>           -->
        </td> 
        @endif
        @if (auth()->user()->level=="yayasan")
        <td>
        <a href="/lihatamandemen/{{$item->kode_prokeramandemen}}"><i class="fas fa-pen" style="color:red"></i></a>
        </td>
        @endif
    </tr>
    @endforeach
</tbody>
</thead>
</table>