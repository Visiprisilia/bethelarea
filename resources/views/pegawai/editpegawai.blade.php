@extends('template')
@section('container')
<!-- Default Bootstrap Form Controls-->
<div id="layoutSidenav_content">
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="edit-3"></i></div>
                                Ubah Data
                            </h1>

                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-n10">
            <div class="row">
                <div class="col-lg-9">
                    <!-- Default Bootstrap Form Controls-->
                    <div id="default">
                        <div class="card mb-4">
                            <div class="card-header">Pegawai</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        @foreach($pegawai as $item)
                                        <form action="/updatepegawai/{{$item->niy}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Nomor Induk Pegawai</label>
                                                    <input class="form-control" id="niy" name="niy"  value="{{$item->niy}}" readonly placeholder="8 Digit pertama tahun bulan tanggal masuk, 2 digit nomor urut" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Nama</label>
                                                    <input class="form-control" id="nama" name="nama"  value="{{$item->nama}}"readonly placeholder="Masukkan Nama" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Foto Pegawai</label>
                                                    <input class="form-control" type="file" id="foto_pegawai" name="foto_pegawai" required  value="{{$item->foto_pegawai}}"  />
                                                    <h6 style="color:Tomato;" >Upload Foto Pegawai</h6>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                            <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Jenis Kelamin</label>
                                                    <input class="form-control" id="jk" name="jk"  value="{{$item->jk}}" required readonly placeholder="Masukkan Tempat Lahir" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Tempat Lahir</label>
                                                    <input class="form-control" id="tempat_lahir" name="tempat_lahir"  value="{{$item->tempat_lahir}}" readonly placeholder="Masukkan Tempat Lahir" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">TTL</label>
                                                    <input class="form-control" id="ttl" type="date" name="ttl"  value="{{$item->ttl}}" required readonly />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Alamat</label>
                                                    <input class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required value="{{$item->alamat}}" readonly/>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Agama</label>
                                                    <input class="form-control" id="agama" name="agama" placeholder="Masukkan Alamat"  required value="{{$item->agama}}" readonly/>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">KTP</label>
                                                    <input class="form-control" type="file" id="file_ktp" name="file_ktp" value="{{$item->file_ktp}}" required />
                                                    <h6 style="color:Tomato;" >Upload KTP</h6>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Pendidikan Terakhir</label>
                                                    <input class="form-control" id="pendidikan" name="pendidikan" value="{{$item->pendidikan}}" required placeholder="Masukkan Pendidikan Terakhir" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Ijasah Terakhir</label>
                                                    <input class="form-control" type="file" id="file_ijasah" name="file_ijasah" required value="{{$item->file_ijasah}}"  />
                                                    <h6 style="color:Tomato;" >Upload Ijasah Terakhir</h6>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">SK Pangkat/Golongan</label>
                                                    <input class="form-control" type="file" id="file_skgolongan" name="file_skgolongan"value="{{$item->file_skgolongan}}"  />
                                                    <h6 style="color:Tomato;" >Upload File SK Pangkat</h6>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Tanggal Masuk</label>
                                                    <input class="form-control" type="date" id="tanggal_masuk" name="tanggal_masuk" value="{{$item->tanggal_masuk}}" required  placeholder="" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Penempatan</label>
                                                    <select class="form-control" id="penempatan" name="penempatan" value="{{$item->penempatan}}" required>
                                                        <option disabled value>Pilih Penempatan</option>
                                                        <option>PAUD</option>
                                                        <option>Kelompok Bermain</option>
                                                        <option>Taman Kanak-kanak</option>
                                                    </select>
                                                    <h6 style="color:Tomato;" >Pilih Penempatan</h6>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">SK Penempatan</label>
                                                    <input class="form-control" type="file" id="file_skpenempatan" name="file_skpenempatan" value="{{$item->file_skpenempatan}}"required  />
                                                    <h6 style="color:Tomato;" >Upload File SK Penempatan</h6>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                            <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Status Kepegawaian</label>
                                                    <select class="form-control" id="status_kepegawaian" name="status_kepegawaian" value="{{$item->status_kepegawaian}}" required>
                                                        <option disabled value>Pilih Status Kepegawaian</option>
                                                        <option>Guru Tetap</option>
                                                        <option>Guru Tidak Tetap</option>
                                                        <option>Staf Tetap</option>
                                                        <option>Staf Tidak Tetap</option>
                                                    </select>
                                                    <h6 style="color:Tomato;" >Pilih Status Kepegawaian</h6>

                                                </div>
                                                    <div class="col-md-4">
                                                        <label class="mb-1" for="inputFirstName">Tanggal PPT</label>
                                                        <input class="form-control" type="date" id="tanggal_ppt" name="tanggal_ppt" value="{{$item->tanggal_ppt}}" />
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="mb-1" for="inputLastName">SK Pegawai</label>
                                                        <input class="form-control" type="file" id="file_suket" name="file_suket" value="{{$item->file_suket}}"  />
                                                        <h6 style="color:Tomato;" >Upload File SK Pegawai </h6>
                                                    </div>
                                                </div>
                                                <div class="row gx-3 mb-3">
                                                    <div class="col-md-4">
                                                        <label class="mb-1" for="inputFirstName">Jabatan</label>
                                                        <input class="form-control" id="jabatan" name="jabatan" placeholder="Masukkan Jabatan" value="{{$item->jabatan}}" required  />
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="mb-1" for="inputLastName">SK Jabatan</label>
                                                        <input class="form-control" type="file" id="file_skjabatan" name="file_skjabatan" value="{{$item->file_skjabatan}}" required />
                                                        <h6 style="color:Tomato;" >Upload File SK Jabatan</h6>
                                                    
                                                    </div>
                                                    <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Status</label>
                                                    <select class="form-control" id="status" name="status" value="{{$item->status}}" required>
                                                    <option value>Pilih Status</option>
                                                        <option value="AKTIF">AKTIF</option>
                                                        <option value="NON AKTIF">NON AKTIF</option>
                                                    </select>
                                                    <h6 style="color:Tomato;" >Pilih Status</h6>

                                                </div>
                                                </div>
                                                <div class="row gx-3 mb-3">                                                   
                                                    <div class="col-md-4" >
                                                        <label class="mb-1" for="inputLastName">Tanggal Terminasi</label>
                                                        <input class="form-control" type="date" id="tanggal_terminasi" name="tanggal_terminasi" value="{{$item->tanggal_terminasi}}"  />
                                                    </div>
                                                    <div class="col-md-4" >
                                                        <label class="mb-1" for="inputLastName">SK Pemberhtentian</label>
                                                        <input class="form-control" type="file" id="file_skpemberhentian" name="file_skpemberhentian" value="{{$item->file_skpemberhentian}}"  />
                                                        <h6 style="color:Tomato;" >Upload File SK Pemberhentian</h6>
                                                    </div>

                                                </div>

                                                <div class="row gx-3 mb-3">
                                                    <div class="col-md-6">
                                                        <label class="mb-1" for="inputFirstName">Keterangan</label>
                                                        <input class="form-control" id="keterangan_pegawai" name="keterangan_pegawai" placeholder="Masukkan Keterangan" value="{{$item->keterangan_pegawai}}" required />
                                                    </div>
                                                </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                                <a href="{{url('/pegawai')}}" class="btn btn-danger">Batal</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<script>
    $(document).on('change','#status',function(){
      var val=$('#status option').filter(':selected').val()=="NON AKTIF"?  $('#terminasi').show():  $('#terminasi').hide();
    
      //   if(val=="murid"{})  
      // alert(val);
    })
</script>
@endforeach
@endsection