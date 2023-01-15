<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No.Bukti</th>
                            <th>Periode</th>
                            <th>Tanggal Pencatatan</th>
                            <th>Keterangan</th>
                            <th>Akun</th>
                            <th>Sumber</th>
                            <th>Jumlah</th>                              
                            <th>Diterima Dari</th>    
                            @if (auth()->user()->level=="unit")                          
                            <th>Aksi</th>
                            @endif
                        </tr>
                    <tbody>
                        @foreach ($kasmasuk as $item)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $item->no_bukti}}</td>
                            <td>{{ $item->periode}}</td>
                            <td>{{ $item->tanggal_pencatatan}}</td>
                            <td>{{ $item->keterangan}}</td>
                            <td>{{ $item->akun}}</td>                            
                            <td>{{ $item->sumber}}</td>                            
                            <td>{{Str::rupiah ($item->jumlah)}}</td>                              
                            <td>{{ $item->nama}}</td>                              
                            @if (auth()->user()->level=="unit")
                            <td>
                                <!-- <a href="/editkasmasuk/{{$item->no_bukti}}"><i class="fas fa-edit" style="color:green"></i></a> | -->
                                <a href="/hapuskasmasuk/{{$item->no_bukti}}" onclick="return confirm('Yakin hapus data?')"><i class="fas fa-trash-alt" style="color:red"></i></a> |
                                <!-- <a href="#" id="del" data-id="{{$item->no_bukti}}" ><i class="fas fa-trash-alt" style="color:red"></i></a> -->
                                <a href="/lihatkasmasuk/{{$item->no_bukti}}"><i class="fas fa-print" style="color:blue"></i></a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                    </thead>
                </table>