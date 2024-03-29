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
            <!-- <th>Total Tagihan</th>
                            <th>Total Pembayaran</th>
                            <th>Total Sisa Pembayaran</th> -->
            @if (auth()->user()->level=="unit" or auth()->user()->level=="yayasan")
            <th>Aksi</th>
            @endif
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
            @if (auth()->user()->level=="unit" or auth()->user()->level=="yayasan")
            

            <td>
                <a href="/lihatpembayaranmurid/{{$item->rincian_id}}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">Detail</a>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
    </thead>
</table>