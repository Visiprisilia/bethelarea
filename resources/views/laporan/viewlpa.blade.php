<script src="{{asset('template/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('template/js/demo/datatables-demo.js')}}"></script>
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
        <td>{{ $item->nama}}</td>
        <td>{{Str::rupiah($item->anggaran)}}</td>
        <td>{{Str::rupiah($item->posisi_anggaran)}}</td>

    </tr>
    @endforeach
    </tbody>
    <th>Total</th>
    <th></th>
    <th></th>
    <th>{{Str::rupiah($anggarans)}}</th>
    <th>{{Str::rupiah($posisianggarans)}}</th>
    </thead>
</table>
