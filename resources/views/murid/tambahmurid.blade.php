@extends('template')
@section('container')
@if($errors->any())
   <ul class="alert alert-danger">
      @foreach($errors->all() as $error)
         <li> {{$error}} </li>
      @endforeach
   </ul>
@endif
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
                                Tambah Data
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
                            <div class="card-header">Murid</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        <form action="/simpanmurid" method="post"  enctype="multipart/form-data">
                                            @csrf
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Nomor Induk Siswa</label>
                                                    <input class="form-control" id="nomor_induk" name="nomor_induk" placeholder="Masukkan NIS"  />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Nomor Induk Siswa Nasional</label>
                                                    <input class="form-control" id="nomor_isn" name="nomor_isn" placeholder="Masukkan NISN"  />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Foto Murid</label>
                                                    <input class="form-control" type="file" id="foto_murid" name="foto_murid"  />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Nama</label>
                                                    <input class="form-control" id="nama" name="nama" placeholder="Masukkan Nama"  />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Tempat Lahir</label>
                                                    <input class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir"  />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Tanggal Lahir</label>
                                                    <input class="form-control" type="date" id="ttl" name="ttl"  />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Jenis Kelamin</label>
                                                    <select class="form-control" id="jk" name="jk" >
                                                        <option  value>Pilih Jenis Kelamin</option>
                                                        <option>Perempuan</option>
                                                        <option>Laki-laki</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Alamat</label>
                                                    <input class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat"  />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Agama</label>
                                                    <select class="form-control" id="agama" name="agama" >
                                                        <option  value>Pilih Agama</option>
                                                        <option>Kristen Protestan</option>
                                                        <option>Katholik</option>
                                                        <option>Islam</option>
                                                        <option>Budha</option>
                                                        <option>Hindu</option>
                                                        <option>Konghucu</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Nama Ayah</label>
                                                    <input class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Masukkan Nama Ayah"  />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Pekerjaan Ayah</label>
                                                    <input class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" placeholder="Masukkan Pekerjaan Ayah"  />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Pendidikan Terakhir Ayah</label>
                                                    <input class="form-control" id="pendidikan_ayah" name="pendidikan_ayah" placeholder="Masukkan Pendidikan Terakhir Ayah"  />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Nama Ibu</label>
                                                    <input class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Masukkan Nama Ibu"  />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Pekerjaan Ibu</label>
                                                    <input class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" placeholder="Masukkan Pekerjaan Ibu"  />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Pendidikan Terakhir Ibu</label>
                                                    <input class="form-control" id="pendidikan_ibu" name="pendidikan_ibu" placeholder="Masukkan Pendidikan Terakhir Ibu"  />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Anak Ke berapa</label>
                                                    <input class="form-control" id="anak_keberapa" name="anak_keberapa" placeholder="Masukkan Anak Ke berapa"  />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Nomor Akte Lahir</label>
                                                    <input class="form-control" id="no_akte" name="no_akte" placeholder="Masukkan Nomor Akte Lahir"  />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Nomor Kontak</label>
                                                    <input class="form-control" id="kontak" name="kontak" placeholder="Masukkan Nomor Kontak"  />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Kartu Keluarga</label>
                                                    <input class="form-control" type="file" id="file_kk" name="file_kk"  />
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Tambah</button>
                                                <a href="{{url('/murid')}}" class="btn btn-danger">Batal</a>
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
@endsection