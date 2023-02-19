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
                            <th>Anggaran</th>
                            <th>Jumlah</th>
                            <th>Jumlah Pertanggungjawaban</th>
                            <th>Penanggung Jawab</th>                              
                            <th>Status</th>                              
                            <th>Tanggal Pertanggungjawaban</th>    
                            @if (auth()->user()->level=="unit")                          
                            <th>Aksi</th>
                            @endif
                        </tr>
                    <tbody>
                        @foreach ($kasbon as $item)
                        <tr>
                            <td>{{ $item->no_buktibon}}</td>
                            <td>{{ $item->periode}}</td>
                            <td>{{ $item->tanggal_pengajuan}}</td>
                            <td>{{ $item->keterangan_bon}}</td>
                            <td>{{ $item->proker_bon}}</td>
                            <td>{{ $item->akun_bon}}</td>
                            <td>{{ Str::rupiah($item->anggaran_bon)}}</td>                            
                            <td>{{ Str::rupiah($item->jumlah_bon)}}</td>                            
                            <td>{{ Str::rupiah($item->jumlah_ptj)}}</td>                            
                            <td>{{ $item->nama}}</td>                              
                            <td>{{ $item->status_bon}}</td>                              
                            <td>{{ $item->tanggal_ptj}}</td>      
                            @if (auth()->user()->level=="unit")                        
                            <td>
                                <!-- <a href="/editkasbon/{{$item->no_buktibon}}"><i class="fas fa-edit" style="color:green"></i></a> | -->
                                <a href="/hapuskasbon/{{$item->no_buktibon}}" onclick="return confirm('Yakin hapus data?')"><i class="fas fa-trash-alt" style="color:red"></i></a> 
                                <!-- <a href="#" id="bon" data-id="{{$item->no_buktibon}}" ><i class="fas fa-trash-alt" style="color:red"></i></a> -->
                                <!-- <a href="/lihatkasbon/{{$item->no_bukti}}"><i class="fas fa-print" style="color:blue"></i></a> -->
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                    </thead>
                </table>
           