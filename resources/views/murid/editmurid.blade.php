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
                                    @foreach($murid as $itemz)
                                    <form action="/updatemurid/{{$itemz->nomor_induk}}" method="post"  enctype="multipart/form-data">
                                            @csrf
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-4">
                                                <label class="mb-1" for="inputLastName">Kelas</label>
                                                <select class="form-control" id="kelas" name="kelas" required value="{{$itemz->kelas}}" >
                                                    <option value>Pilih Kelas</option>
                                                    @foreach ($kelas as $item)
                                                    <option value="{{ $item->nama_kelas}}">{{$item->nama_kelas}} </option>
                                                    @endforeach
                                                </select>
                                                <h6 style="color:Tomato;" >Pilih Kelas</h6>
                                                </div>

                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Nomor Induk Siswa</label>
                                                    <input class="form-control" id="nomor_induk" name="nomor_induk" readonly value="{{$itemz->nomor_induk}}" placeholder="Masukkan NIS" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Nomor Induk Siswa Nasional</label>
                                                    <input class="form-control" id="nomor_isn" name="nomor_isn" readonly value="{{$itemz->nomor_isn}}" placeholder="Masukkan NISN" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Foto Murid</label>
                                                    <input class="form-control" type="file" id="foto_murid" name="foto_murid"  value="{{$itemz->foto_murid}}"  />
                                                    <h6 style="color:Tomato;" >Upload Foto Murid</h6>

                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Nama</label>
                                                    <input class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" readonly value="{{$itemz->nama}}"/>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Tempat Lahir</label>
                                                    <input class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" readonly value="{{$itemz->tempat_lahir}}" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Tanggal Lahir</label>
                                                    <input class="form-control" type="date" id="ttl" name="ttl" readonly value="{{$itemz->ttl}}"/>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Jenis Kelamin</label>
                                                    <input class="form-control" id="jk" name="jk" placeholder="Masukkan Alamat"  readonly value="{{$itemz->jk}}"/>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Alamat</label>
                                                    <input class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat"  readonly value="{{$itemz->alamat}}" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Agama</label>
                                                    <input class="form-control" id="agama" name="agama" placeholder="Masukkan Alamat"  readonly value="{{$itemz->agama}}"/>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Nama Ayah</label>
                                                    <input class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Masukkan Nama Ayah" readonly value="{{$itemz->nama_ayah}}" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Pekerjaan Ayah</label>
                                                    <input class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah"  readonly value="{{$itemz->pekerjaan_ayah}}" placeholder="Masukkan Pekerjaan Ayah" />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Pendidikan Terakhir Ayah</label>
                                                    <input class="form-control" id="pendidikan_ayah" name="pendidikan_ayah"  readonly value="{{$itemz->pendidikan_ayah}}" placeholder="Masukkan Pendidikan Terakhir Ayah" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">KTP Ayah</label>
                                                    <input class="form-control" type="file" id="ktp_ayah" name="ktp_ayah"   value="{{$itemz->ktp_ayah}}" placeholder="Masukkan Pendidikan Terakhir Ayah" />
                                                    <h6 style="color:Tomato;" >Upload KTP Ayah</h6>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Nama Ibu</label>
                                                    <input class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Masukkan Nama Ibu"  readonly value="{{$itemz->nama_ibu}}" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Pekerjaan Ibu</label>
                                                    <input class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu"  readonly value="{{$itemz->pekerjaan_ibu}}" placeholder="Masukkan Pekerjaan Ibu" />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Pendidikan Terakhir Ibu</label>
                                                    <input class="form-control" id="pendidikan_ibu" name="pendidikan_ibu"  readonly value="{{$itemz->pendidikan_ibu}}" placeholder="Masukkan Pendidikan Terakhir Ibu" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">KTP Ibu</label>
                                                    <input class="form-control" type="file" id="ktp_ibu" name="ktp_ibu"  value="{{$itemz->ktp_ibu}}" placeholder="Masukkan Pendidikan Terakhir Ayah" />
                                                    <h6 style="color:Tomato;" >Upload KTP Ibu</h6>

                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Anak Ke berapa</label>
                                                    <input class="form-control" id="anak_keberapa" name="anak_keberapa"  readonly value="{{$itemz->anak_keberapa}}" placeholder="Masukkan Anak Ke berapa (Cth:1)" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Nomor Akte Lahir</label>
                                                    <input class="form-control" id="no_akte" name="no_akte"  readonly value="{{$itemz->no_akte}}" placeholder="Masukkan Nomor Akte Lahir" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Akte Lahir</label>
                                                    <input class="form-control" type="file" id="file_akte" name="file_akte"   value="{{$itemz->file_akte}}" placeholder="Masukkan Nomor Akte Lahir" />
                                                    <h6 style="color:Tomato;" >Upload Akte Lahir</h6>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Nomor Kontak</label>
                                                    <input class="form-control" id="kontak" name="kontak"   value="{{$itemz->kontak}}" placeholder="Masukkan Nomor Kontak" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Kartu Keluarga</label>
                                                    <input class="form-control" type="file" id="file_kk" name="file_kk" value="{{$itemz->file_kk}}" />
                                                    <h6 style="color:Tomato;" >Upload Kartu Keluarga</h6>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Tanggal Siswa Diterima</label>
                                                    <input class="form-control" type="date" id="tanggal_penerimaan" name="tanggal_penerimaan"   value="{{$itemz->tanggal_penerimaan}}" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Bukti Diterima</label>
                                                    <input class="form-control" type="file" id="file_suratpenerimaan" name="file_suratpenerimaan" value="{{$itemz->file_suratpenerimaan}}"/>
                                                    <h6 style="color:Tomato;" >Upload Bukti Diterima</h6>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Tanggal Kenaikan Kelas</label>
                                                    <input class="form-control" type="date" id="tanggal_kenaikankelas" name="tanggal_kenaikankelas"  value="{{$itemz->tanggal_kenaikankelas}}"/>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Bukti Kenaikan Kelas</label>
                                                    <input class="form-control" type="file" id="file_suratkenaikankelas" name="file_suratkenaikankelas"   value="{{$itemz->file_suratkenaikankelas}}" />
                                                    <h6 style="color:Tomato;" >Upload Bukti Kenaikan Kelas</h6>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Tanggal Penerimaan Raport</label>
                                                    <input class="form-control" type="date" id="tanggal_raport" name="tanggal_raport"   value="{{$itemz->tanggal_raport}}" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Bukti Penerimaan Raport</label>
                                                    <input class="form-control" type="file" id="file_raport" name="file_raport"  value="{{$itemz->file_raport}}" />
                                                    <h6 style="color:Tomato;" >Upload File Raport</h6>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Status</label>
                                                    <select class="form-control" id="status_murid" name="status_murid">
                                                            <option value>Pilih Status</option>
                                                            <option value="AKTIF">AKTIF</option>
                                                            <option value="NON AKTIF">NON AKTIF</option>
                                                        </select>
                                                        <h6 style="color:Tomato;" >Pilih Status</h6>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Tanggal Kelulusan</label>
                                                    <input class="form-control" type="date" id="tanggal_kelulusan" name="tanggal_kelulusan"   value="{{$itemz->tanggal_kelulusan}}" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Bukti Kelulusan</label>
                                                    <input class="form-control" type="file" id="file_suratkelulusan" name="file_suratkelulusan"   value="{{$itemz->file_suratkelulusan}}" />
                                                    <h6 style="color:Tomato;" >Upload Bukti Kelulusan</h6>
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
