@extends('template')
@section('container')
<!-- Default Bootstrap Form Controls-->
@if($errors->any())
<ul class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li> {{$error}} </li>
    @endforeach
</ul>
@endif
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
                            <div class="card-header">Pegawai</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        <form action="/simpanpegawai" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Nomor Induk Pegawai</label>
                                                    <input class="form-control" id="niy" name="niy" placeholder="8 Digit pertama tahun bulan tanggal masuk, 2 digit nomor urut" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Nama</label>
                                                    <input class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Foto Pegawai</label>
                                                    <input class="form-control" type="file" id="foto_pegawai" name="foto_pegawai" />
                                                </div>
                                            </div>

                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Jenis Kelamin</label>
                                                    <select class="form-control" id="jk" name="jk">
                                                        <option value>Pilih Jenis Kelamin</option>
                                                        <option>Perempuan</option>
                                                        <option>Laki-laki</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Tempat Lahir</label>
                                                    <input class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">TTL</label>
                                                    <input class="form-control" id="ttl" type="date" name="ttl" />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Alamat</label>
                                                    <input class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Agama</label>
                                                    <select class="form-control" id="agama" name="agama">
                                                        <option value>Pilih Agama</option>
                                                        <option>Kristen Protestan</option>
                                                        <option>Katholik</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">KTP</label>
                                                    <input class="form-control" type="file" id="file_ktp" name="file_ktp" />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Pendidikan Terakhir</label>
                                                    <input class="form-control" id="pendidikan" name="pendidikan" placeholder="Masukkan Pendidikan Terakhir" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Ijasah Terakhir</label>
                                                    <input class="form-control" type="file" id="file_ijasah" name="file_ijasah" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">SK Pangkat/Golongan</label>
                                                    <input class="form-control" type="file" id="file_skgolongan" name="file_skgolongan" />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Tanggal Masuk</label>
                                                    <input class="form-control" type="date" id="tanggal_masuk" name="tanggal_masuk" placeholder="" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Penempatan</label>
                                                    <select class="form-control" id="penempatan" name="penempatan">
                                                        <option value>Pilih Penempatan</option>
                                                        <option>PAUD</option>
                                                        <option>Kelompok Bermain</option>
                                                        <option>Taman Kanak-kanak</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">SK Penempatan</label>
                                                    <input class="form-control" type="file" id="file_skpenempatan" name="file_skpenempatan" />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Status Kepegawaian</label>
                                                    <select class="form-control" id="status_kepegawaian" name="status_kepegawaian">
                                                        <option value>Pilih Status Kepegawaian</option>
                                                        <option>Guru Tetap</option>
                                                        <option>Guru Tidak Tetap</option>
                                                        <option>Staf Tetap</option>
                                                        <option>Staf Tidak Tetap</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4" id="tglppt" style="display: none;">
                                                    <label class="mb-1" for="inputLastName">Tanggal PPT</label>
                                                    <input class="form-control" type="date" id="tanggal_ppt" name="tanggal_ppt" />
                                                </div>
                                                <div class="col-md-4" id="skpegawai" style="display: none;">
                                                    <label class="mb-1" for="inputLastName">SK Pegawai</label>
                                                    <input class="form-control" type="file" id="file_suket" name="file_suket" />
                                                </div>
                                                <div class="col-md-4" id="tglpst" style="display: none;">
                                                    <label class="mb-1" for="inputLastName">Tanggal PST</label>
                                                    <input class="form-control" type="date" id="tanggal_ppt" name="tanggal_ppt" />
                                                </div>
                                                <div class="col-md-4" id="skstaf" style="display: none;">
                                                    <label class="mb-1" for="inputLastName">SK Staf</label>
                                                    <input class="form-control" type="file" id="file_suketstaf" name="file_suketstaf" />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Jabatan</label>
                                                    <input class="form-control" id="jabatan" name="jabatan" placeholder="Masukkan Jabatan" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">SK Jabatan</label>
                                                    <input class="form-control" type="file" id="file_skjabatan" name="file_skjabatan" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Status</label>
                                                    <select class="form-control" id="status" name="status">
                                                        <option value>Pilih Status</option>
                                                        <option value="AKTIF">AKTIF</option>
                                                        <option value="NON AKTIF">NON AKTIF</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-4" id="terminasi" style="display: none;">
                                                    <label class="mb-1" for="inputLastName">Tanggal Terminasi</label>
                                                    <input class="form-control" type="date" id="tanggal_terminasi" name="tanggal_terminasi" />
                                                </div>
                                                <div class="col-md-4" id="sk" style="display: none;">
                                                    <label class="mb-1" for="inputLastName">SK Pemberhentian</label>
                                                    <input class="form-control" type="file" id="file_skpemberhentian" name="file_skpemberhentian" />
                                                </div>
                                            </div>

                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Keterangan</label>
                                                    <input class="form-control" id="keterangan_pegawai" name="keterangan_pegawai" placeholder="Masukkan Keterangan" />
                                                </div>
                                            </div>
                                            <div class="col-mb-3">
                                                <button type="submit" class="btn btn-success">Tambah</button>
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
    $(document).on('change', '#status', function() {
        var val = $('#status option').filter(':selected').val() == "NON AKTIF" ? $('#terminasi').show() : $('#terminasi').hide();
        var val = $('#status option').filter(':selected').val() == "NON AKTIF" ? $('#sk').show() : $('#sk').hide();

        //   if(val=="murid"{})  
        // alert(val);
    })

    $(document).on('change', '#status_kepegawaian', function() {
        var val = $('#status_kepegawaian option').filter(':selected').val() == "Guru Tetap" ? $('#tglppt').show() : $('#tglppt').hide();
        var val = $('#status_kepegawaian option').filter(':selected').val() == "Guru Tetap" ? $('#skpegawai').show() : $('#skpegawai').hide();
        var val = $('#status_kepegawaian option').filter(':selected').val() == "Staf Tetap" ? $('#tglpst').show() : $('#tglpst').hide();
        var val = $('#status_kepegawaian option').filter(':selected').val() == "Staf Tetap" ? $('#skstaf').show() : $('#skstaf').hide();
    })
</script>
@endsection