<script src="{{asset('template/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('template/js/demo/datatables-demo.js')}}"></script>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Tagihan</th>
                                <th>Jumlah Tagihan</th>
                                <th>Jumlah Pembayaran</th>
                                <th>Sisa Pembayaran</th>
                            </tr>
                        <tbody>
                            @foreach ($pembayaran as $item)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ $item->nama_akun}}</td>
                                <td>{{ Str::rupiah ($item->rincian_nominal)}}</td>
                                <td>{{ Str::rupiah ($item->pembayaran)}}</td>
                                <td>{{ Str::rupiah ($item->sisapembayaran)}}</td>
                            </tr>
                            @endforeach
                            <th>Total</th>
                            <th></th>
                            <th>{{Str::rupiah($tagihan)}}</th>
                            <th>{{Str::rupiah($bayaran)}}</th>
                            <th>{{Str::rupiah($sisa)}}</th>

                            </thead>
                    </table>
               
    