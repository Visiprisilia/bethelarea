		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Induk Siswa</th>
                            <th>Nomor Induk Siswa Nasional</th>
                            <!-- <th>Kelas</th> -->
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Agama</th>
                            <th>Nama Ayah</th>
                            <th>Nama Ibu</th>
                            <!-- <th>Pekerjaan Ayah</th>
                            <th>Pekerjaan Ibu</th> -->
                            <!-- <th>Pendidikan Terakhir Ayah</th>
                            <th>Pendidikan Terakhir Ibu</th> -->
                            <!-- <th>Anak Ke Berapa</th>
                            <th>Nomor Akte Lahir</th> -->
                            <th>Kontak</th>
                        </tr>  
                    <tbody>
                        @foreach ($murid as $item)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $item->nomor_induk}}</td>
                            <td>{{ $item->nomor_isn}}</td>
                            <!-- <td>{{ $item->kelas}}</td> -->
                            <td>{{ $item->nama}}</td>
                            <td>{{ $item->tempat_lahir}}</td>
                            <td>{{ $item->ttl}}</td>
                            <td>{{ $item->jk}}</td>
                            <td>{{ $item->alamat}}</td>
                            <td>{{ $item->agama}}</td>
                            <td>{{ $item->nama_ayah}}</td>
                            <td>{{ $item->nama_ibu}}</td>
                            <!-- <td>{{ $item->pekerjaan_ayah}}</td>
                            <td>{{ $item->pekerjaan_ibu}}</td> -->
                            <!-- <td>{{ $item->pendidikan_ayah}}</td>
                            <td>{{ $item->pendidikan_ibu}}</td> -->
                            <!-- <td>{{ $item->anak_keberapa}}</td>
                            <td>{{ $item->no_akte}}</td> -->
                            <td>{{ $item->kontak}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    </thead>
                </table>
<br><br><br><br><br><br><br><br>
				<input class="no-print" type="button" value="Cetak" onclick="window.print()">
<input type="button" value="Kembali" onclick=self.history.back() class="no-print">

