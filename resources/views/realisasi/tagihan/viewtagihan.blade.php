<script src="{{asset('template/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<!-- Page level custom scripts -->
<script src="{{asset('template/js/demo/datatables-demo.js')}}"></script>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Nomor Induk</th>
            <th>Nama Murid</th>
            <th>Total Tagihan</th>
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
                <a href="/lihattagihanmurid/{{$item->id_tagihan}}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">Tambah/Lihat Tagihan</a>
                <!-- <a href="/hapustagihan/{{$item->nis_tagihan}}" onclick="return confirm('Yakin hapus data?')"><i class="fas fa-trash-alt" style="color:red"></i></a> -->
            </td>
            @endif
            <!-- <a href="/lihattagihan/{{$item->nis_tagihan}}"><i class="fas fa-eye" style="color:red"></i></a> -->
        </tr>
        @endforeach
        <td>Total</td>
        <td></td>
        <td></td>
        <td>{{Str::rupiah($totals)}}</td>
        <td></td>
        </thead>
</table>