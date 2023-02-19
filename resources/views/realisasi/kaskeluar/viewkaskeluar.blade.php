<script src="{{asset('template/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('template/js/demo/datatables-demo.js')}}"></script>
            <div class="table-responsive" id="tablekaskeluar">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.Bukti</th>
                            <th>Periode</th>
                            <th>Tanggal Pencatatan</th>
                            <th>Keterangan</th>
                            <th>Jumlah</th>                              
                            <th>Bukti Nota</th>          
                            @if (auth()->user()->level=="unit")                        
                            <th>Aksi</th>
                            @endif
                            @if (auth()->user()->level=="yayasan")                        
                            <th>Aksi</th>
                            @endif
                        </tr>
                    <tbody>
                        @foreach ($kaskeluar as $item)
                        <tr>
                            <td>{{ $item->no_bukti}}</td>
                            <td>{{ $item->periode}}</td>
                            <td>{{ $item->tanggal_pencatatan}}</td>
                            <td>{{ $item->keterangan}}</td>                       
                            <td>{{ Str::rupiah($item->jumlah)}}</td>                              
                            <td>{{ $item->bukti}}</td>      
                            @if (auth()->user()->level=="unit")                             
                            <td>
                                <!-- <a href="/editkaskeluar/{{$item->no_bukti}}"><i class="fas fa-edit" style="color:green"></i></a> | -->
                                <a href="/hapuskaskeluar/{{$item->no_bukti}}" onclick="return confirm('Yakin hapus data?')"><i class="fas fa-trash-alt" style="color:red"></i></a> |
                                <!-- <a href="#" id="kk" data-id="{{$item->no_bukti}}" ><i class="fas fa-trash-alt" style="color:red"></i></a> -->
                                <a href="/lihatkaskeluar/{{$item->no_bukti}}"><i class="fas fa-print" style="color:blue"></i></a>
                                <a href="/downloadbkk/{{($item->no_bukti) }}" download=""><i class="fas fa-download" style="color:orange"></i></a>

                            </td>
                            @endif 
                            @if (auth()->user()->level=="yayasan")                             
                            <td>
                               <a href="/downloadbkk/{{($item->no_bukti) }}" download=""><i class="fas fa-download" style="color:orange"></i></a>
                            </td>
                            @endif                            
                        </tr>
                        @endforeach
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>

</div>
