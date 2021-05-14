<script src="{{asset('template/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('template/js/demo/datatables-demo.js')}}"></script>
        <div class="table-responsive" id="tablemurid">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Induk Siswa</th>
                            <th>Nomor Induk Siswa Nasional</th>
                            <th>Kelas</th>
                            <th>Nama</th>
                            <th>Tempat Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Agama</th>
                            <th>Nama Ayah</th>
                            <th>Nama Ibu</th>
                            <th>Pekerjaan Ayah</th>
                            <th>Pekerjaan Ibu</th>
                            <th>Pendidikan Terakhir Ayah</th>
                            <th>Pendidikan Terakhir Ibu</th>
                            <th>Anak Ke Berapa</th>
                            <th>Nomor Akte Lahir</th>
                            <th>Kontak</th>
                            @if (auth()->user()->level=="super admin")
                            <th>Perubahan Data</th>
                            <th>Aksi</th>
                            @endif
                        </tr>
                    <tbody>
                        @foreach ($murid as $item)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $item->nomor_induk}}</td>
                            <td>{{ $item->nomor_isn}}</td>
                            <td>{{ $item->kelas}}</td>
                            <td>{{ $item->nama}}</td>
                            <td>{{ $item->ttl}}</td>
                            <td>{{ $item->jk}}</td>
                            <td>{{ $item->alamat}}</td>
                            <td>{{ $item->agama}}</td>
                            <td>{{ $item->nama_ayah}}</td>
                            <td>{{ $item->nama_ibu}}</td>
                            <td>{{ $item->pekerjaan_ayah}}</td>
                            <td>{{ $item->pekerjaan_ibu}}</td>
                            <td>{{ $item->pendidikan_ayah}}</td>
                            <td>{{ $item->pendidikan_ibu}}</td>
                            <td>{{ $item->anak_keberapa}}</td>
                            <td>{{ $item->no_akte}}</td>
                            <td>{{ $item->kontak}}</td>
                            @if (auth()->user()->level=="super admin")
                            <td>
                                <a href="/editmurid/{{$item->nomor_induk}}"><i class="fas fa-edit" style="color:green"></i></a>
                            </td>
                            <td>
                                <a href="/lihatmurid/{{$item->nomor_induk}}"><i class="fas fa-eye" style="color:blue"></i></a>
                                <a href="/hapusmurid/{{$item->nomor_induk}}" onclick="return confirm('Yakin hapus data?')"><i class="fas fa-trash-alt" style="color:red"></i></a>
                                <!-- <a href="#" id="del" data-id="{{$item->nomor_induk}}" ><i class="fas fa-trash-alt" style="color:red"></i></a> -->
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                    </thead>
                </table>
            </div>
     
