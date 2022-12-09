<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
    <tr>
        <th>No</th>
        <th>Kode Akun</th>
        <th>Nama Akun</th>
        <th>Anggaran</th>
        <th>Posisi Anggaran</th>
    </tr>
<tbody>
    @foreach ($lapposisianggaran as $item)
    <tr>
        <td>{{ $loop->iteration}}</td>
        <td>{{ $item->akun}}</td>
        <td>{{ $item->nama_akun}}</td>
        <td>{{Str::rupiah($item->anggaran)}}</td>
        <td>{{Str::rupiah($item->posisi_anggaran)}}</td>

    </tr>
    @endforeach
</tbody>
</thead>
</table>
