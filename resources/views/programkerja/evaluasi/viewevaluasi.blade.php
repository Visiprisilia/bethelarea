<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Periode</th>
            <th>Kode Program Kerja</th>
            <th>Nama Program Kerja</th>
            <th>Penanggung Jawab</th>
            <th>Tujuan</th>
            <th>Akun Biaya</th>
            <th>Rencana Anggaran</th>
            <th>Realisasi Anggaran</th>
            <th>Rencana Waktu</th>
            <th>Realisasi Waktu</th>
            <th>Indikator Pencapaian</th>
            <th>Kinerja Pencapaian</th>
            <th>Faktor Pendorong</th>
            <th>Faktor Penghambat</th>
            <th>Tindak Lanjut</th>
            @if (auth()->user()->level=="unit")
            <th>Aksi</th>
            @endif
        </tr>
    <tbody>
        @foreach ($evaluasi as $item)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $item->periode}}</td>
            <td>{{ $item->kode_proker}}</td>
            <td>{{ $item->nama_proker}}</td>
            <td>{{ $item->nama}}</td>
            <td>{{ $item->tujuan}}</td>
            <td>{{ $item->akun_beban}}</td>
            <td>{{Str::rupiah ($item->rencana_anggaran)}}</td>
            <td>{{Str::rupiah ($item->realisasi_anggaran)}}</td>
            <td>{{ $item->rencana_waktu}}</td>
            <td>{{ $item->realisasi_waktu}}</td>
            <td>{{ $item->indikator_pencapaian}}</td>
            <td>{{ $item->kinerja_pencapaian}}</td>
            <td>{{ $item->faktor_pendorong}}</td>
            <td>{{ $item->faktor_penghambat}}</td>
            <td>{{ $item->tindaklanjut}}</td>
            @if (auth()->user()->level=="unit")
            <td>
                <a href="/editevaluasi/{{$item->kode_proker}}"><i class="fas fa-edit" style="color:green"></i></a> |
                <a href="/hapusevaluasi/{{$item->kode_proker}}" onclick="return confirm('Yakin hapus data?')"><i class="fas fa-trash-alt" style="color:red"></i></a>
                <!-- <a href="#" id="eval" data-id="{{$item->kode_proker}}" ><i class="fas fa-trash-alt" style="color:red"></i></a> -->
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
    </thead>
</table>
