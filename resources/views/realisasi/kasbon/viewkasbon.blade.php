<script src="{{asset('template/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('template/js/demo/datatables-demo.js')}}"></script>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.Bukti</th>
                            <th>Periode</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Keterangan</th>
                            <th>Program Kerja</th>
                            <th>Akun</th>
                            <!-- <th>Anggaran</th> -->
                            <th>Jumlah Bon</th>
                            <!-- <th>Jumlah Pertanggungjawaban</th> -->
                            <th>Penanggung Jawab</th>                              
                            <th>Status</th>                              
                            <th>Tanggal Pertanggungjawaban</th>    
                            @if (auth()->user()->level=="unit")                          
                            <th>Pertanggungjawaban</th>
                            <th>Aksi</th>
                            @endif
                        </tr>
                    <tbody>
                        @foreach ($kasbon as $item)
                        <tr>
                            <td>{{ $item->no_bukti}}</td>
                            <td>{{ $item->periode}}</td>
                            <td>{{ $item->tanggal_pengajuan}}</td>
                            <td>{{ $item->keterangan_bon}}</td>
                            <td>{{ $item->nama_proker}}</td>
                            <td>{{ $item->nama_akun}}</td>
                            <!-- <td>{{ Str::rupiah($item->anggaran_bon)}}</td>                             -->
                            <td>{{ Str::rupiah($item->jumlah_bon)}}</td>                            
                            <!-- <td>{{ Str::rupiah($item->jumlah_ptj)}}</td>                             -->
                            <td>{{ $item->nama}}</td>                              
                            <td>{{ $item->status_bon}}</td>                              
                            <td>{{ $item->tanggal_ptj}}</td>      
                            @if (auth()->user()->level=="unit")                        
                            <td>
                                <a href="/ptjbons/{{$item->no_bukti}}"class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">Pertanggungjawaban</i></a> 
                            </td>
                            <td>
                                <a href="/lihatkasbon/{{$item->no_bukti}}"><i class="fas fa-print" style="color:blue"></i></a>
                                <a href="/hapuskasbon/{{$item->no_bukti}}" onclick="return confirm('Yakin hapus data?')"><i class="fas fa-trash-alt" style="color:red"></i></a> 
                                <!-- <a href="#" id="bon" data-id="{{$item->no_buktibon}}" ><i class="fas fa-trash-alt" style="color:red"></i></a> -->
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                    </thead>
                </table>
           