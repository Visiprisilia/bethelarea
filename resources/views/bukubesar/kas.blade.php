<script src="{{asset('template/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('template/js/demo/datatables-demo.js')}}"></script>
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
         <!-- echo anchor('admin/orders/view/'. $order->id,$order->order_number); -->
            <td>{{ $loop->iteration}}</td>
            <td><a href="/lihatkas/{{$item->no_bukti}}">{{ $item->no_bukti}}</td>
            <td>{{ $item->keterangan}}</td>
            <td>{{Str::rupiah($item->bertambah)}}</td>
            <td>{{Str::rupiah($item->berkurang)}}</td>
            <td>{{Str::rupiah($saldo = $saldo + $item->bertambah - $item->berkurang)}}</td>
        </tr>
        @endforeach
    </tbody>
    <th>Total</th>
    <th></th>
    <th></th>
    <th>{{Str::rupiah($tambah)}}</th>
    <th>{{Str::rupiah($kurang)}}</th>
    <th>{{Str::rupiah($totalbbkas)}}</th>
    </thead>
</table>