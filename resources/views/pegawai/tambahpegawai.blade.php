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
                                        <form action="/simpanpegawai" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Nomor Induk Yayasan</label>
                                                <input class="form-control" id="niy" name="niy" placeholder="4 digit pertama tahun masuk 3 digit terakhir nomor urut. Contoh : 2022001"  />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Nama</label>
                                                <input class="form-control" id="nama" name="nama" placeholder="NAMA" />
                                            </div>
                                            <!-- <div class="mb-3">
                                            <label for="exampleFormControlSelect1">Jabatan</label>
                                                <select class="form-control" id="jabatan_pegawai" name="jabatan_pegawai">
                                                <option disabled value>Pilih Jabatan</option>    
                                                <option>Kepala Sekolah</option>
                                                    <option>Guru</option>
                                                    <option>Staf</option>
                                                    <option>Bendahara</option>
                                                </select>
                                            </div> -->
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">TTL</label>
                                                <input class="form-control" type="date" id="ttl" name="ttl"  />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Agama</label>
                                                <input class="form-control" id="agama" name="agama"  />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Pendidikan</label>
                                                <input class="form-control" id="pendidikan" name="pendidikan" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Alamat</label>
                                                <input class="form-control" id="alamat" name="alamat" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Tanggal Masuk</label>
                                                <input class="form-control" type="date" id="tanggal_masuk" name="tanggal_masuk"  />
                                            </div>
                                            <div class="mb-3">
                                            <label for="exampleFormControlSelect1">Status Kepegawaian</label>
                                                <select class="form-control" id="status_kepegawaian" name="status_kepegawaian">
                                                <option disabled value>Pilih Kepegawaian</option>   
                                                <option>Pegawai Tetap</option>
                                                    <option>GTT</option>
                                                    <option>TTT</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Tanggal Penetapan Pegawai Tetap</label>
                                                <input class="form-control" type="date" id="tanggal_ppt" name="tanggal_ppt" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Surat Keterangan</label>
                                                <input class="form-control" type="file" id="file_suket" name="file_suket" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Status</label>
                                                <input class="form-control"  id="status" name="status" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Tanggal Termin</label>
                                                <input class="form-control"  type="date" id="tanggal_termin" name="tanggal_termin" />
                                            </div>        
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Keterangan</label>
                                                <input class="form-control"  id="keterangan" name="keterangan" />
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Tambah</button>
                                                <a href="{{url('/pegawai')}}" class="btn btn-danger">Batal</a>                                            </div>
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