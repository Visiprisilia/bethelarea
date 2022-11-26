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
                            <div class="card-header">Murid</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                    @foreach($murid as $item)
                                    <form action="/updatemurid/{{$item->nomor_induk}}" method="post">
                                            @csrf
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Nomor Induk Siswa</label>
                                                    <input class="form-control" id="nomor_induk" name="nomor_induk" placeholder="Masukkan NIS" required value="{{$item->nomor_induk}}" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Nomor Induk Siswa Nasional</label>
                                                    <input class="form-control" id="nomor_isn" name="nomor_isn" placeholder="Masukkan NISN" required value="{{$item->nomor_isn}}" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Foto Murid</label>
                                                    <input class="form-control" type="file" id="foto_murid" name="foto_murid" required value="{{$item->foto_murid}}" />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Nama</label>
                                                    <input class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required value="{{$item->nama}}"  />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Tempat Lahir</label>
                                                    <input class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" required value="{{$item->tempat_lahir}}" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Tanggal Lahir</label>
                                                    <input class="form-control" type="date" id="ttl" name="ttl" required value="{{$item->ttl}}" />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Jenis Kelamin</label>
                                                    <select class="form-control" id="jk" name="jk" required value="{{$item->jk}}" >
                                                        <option disabled value>Pilih Jenis Kelamin</option>
                                                        <option>Perempuan</option>
                                                        <option>Laki-laki</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Alamat</label>
                                                    <input class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required value="{{$item->alamat}}"  />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Agama</label>
                                                    <select class="form-control" id="agama" name="agama" required value="{{$item->agama}}" >
                                                        <option disabled value>Pilih Agama</option>
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
                                                    <input class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Masukkan Nama Ayah" required value="{{$item->nama_ayah}}"  />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Pekerjaan Ayah</label>
                                                    <input class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" placeholder="Masukkan Pekerjaan Ayah" required value="{{$item->pekerjaan_ayah}}" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Pendidikan Terakhir Ayah</label>
                                                    <input class="form-control" id="pendidikan_ayah" name="pendidikan_ayah" placeholder="Masukkan Pendidikan Terakhir Ayah" required value="{{$item->pendidikan_ayah}}" />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Nama Ibu</label>
                                                    <input class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Masukkan Nama Ibu" required value="{{$item->nama_ibu}}" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Pekerjaan Ibu</label>
                                                    <input class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" placeholder="Masukkan Pekerjaan Ibu" required value="{{$item->pekerjaan_ibu}}" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Pendidikan Terakhir Ibu</label>
                                                    <input class="form-control" id="pendidikan_ibu" name="pendidikan_ibu" placeholder="Masukkan Pendidikan Terakhir Ibu" required value="{{$item->pendidikan_ibu}}" />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Anak Ke berapa</label>
                                                    <input class="form-control" id="anak_keberapa" name="anak_keberapa" placeholder="Masukkan Anak Ke berapa" required value="{{$item->anak_keberapa}}" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Nomor Akte Lahir</label>
                                                    <input class="form-control" id="no_akte" name="no_akte" placeholder="Masukkan Nomor Akte Lahir" required value="{{$item->no_akte}}" />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Nomor Kontak</label>
                                                    <input class="form-control" id="kontak" name="kontak" placeholder="Masukkan Nomor Akte Lahir" required value="{{$item->kontak}}" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Kartu Keluarga</label>
                                                    <input class="form-control" type="file" id="file_kk" name="file_kk" required value="{{$item->file_kk}}" />
                                                </div>
                                            </div>              
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                                <a href="{{url('/murid')}}" class="btn btn-danger">Batal</a>                                            </div>
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
@endforeach
@endsection
