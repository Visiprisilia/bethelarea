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
                            <div class="card-header">Program Kerja</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        @foreach($programkerja as $items)

                                        <form action="/updateprogramkerja/{{$items->kode_proker}}" method="post">
                                            @csrf
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-8">
                                                    <label class="mb-1" for="inputLastName">Periode</label>
                                                    <input class="form-control" id="periode" name="periode" readonly placeholder="Masukkan Nama Proker" value="{{ $items->periode}}" required />                                                    
                                                </div>
                                                <!-- <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Kode Program Kerja</label>
                                                    <input class="form-control" id="kode_proker" name="kode_proker" placeholder="Masukkan Kode Proker" required />
                                                </div> -->
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Nama Program Kerja</label>
                                                    <input class="form-control" id="nama_proker"  name="nama_proker" placeholder="Masukkan Nama Proker" value="{{ $items->nama_proker}}" required />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Penanggung Jawab</label>
                                                    <input class="form-control" id="penanggungjawabs" readonly name="penanggungjawabs" placeholder="Masukkan Nama Proker" value="{{ $items->nama}}" required />
                                                    <input class="form-control" id="penanggungjawab" hidden  name="penanggungjawab" placeholder="Masukkan Nama Proker" value="{{ $items->penanggungjawab}}" required />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Waktu Mulai</label>
                                                    <input class="form-control" type="date" id="waktu_mulai"  name="waktu_mulai" value="{{ $items->waktu_mulai}}" required />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Waktu Selesai</label>
                                                    <input class="form-control" type="date" id="waktu_selesai"  name="waktu_selesai" value="{{ $items->waktu_selesai}}" required />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Tujuan</label>
                                                    <input class="form-control" id="tujuan" name="tujuan"  value="{{ $items->tujuan}}" required />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Indikator Pencapaian</label>
                                                    <input class="form-control" id="indikator" name="indikator"  value="{{ $items->indikator}}" required />
                                                </div>
                                            </div>
                                            <?php $j=1;

                                            ?>

                                            @foreach($akun as $akunss)
                                            <div class="row gx-3 mb-3">
                                                    <input class="form-control" hidden readonly id="id<?=$j?>" name="id<?=$j?>" value="{{ $akunss->id}}"  required />                                                                                                                         
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlInput1">Akun</label>
                                                    <input class="form-control" readonly id="kode_akuns<?=$j?>" name="kode_akuns<?=$j?>" value="{{ $akunss->nama_akun}}" required />
                                                    <input class="form-control" readonly id="kode_akun<?=$j?>" hidden name="kode_akun<?=$j?>" value="{{ $akunss->kode_akun}}" required />
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlInput1">Anggaran</label>
                                                    <input class="form-control" id="jumlah<?=$j?>" name="jumlah<?=$j?>"  value="{{ $akunss->jumlah}}" required onblur="hitung_totalanggaran()"/>
                                                </div></div>
                                                <?php $j++;
                                                ?>

                                                @endforeach
                                                <input class="form-control" hidden readonly id="jumlahbaris" name="jumlahbaris" value="<?=$j-1?>"  required />                                                                                                                         
                                                <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlInput1">Jumlah Anggaran</label>
                                                    <input class="form-control" id="anggaran" name="anggaran" readonly value="{{ $items->anggaran}}" required />
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Keterangan</label>
                                                <input class="form-control" id="keterangan_proker" name="keterangan_proker"  value="{{ $items->keterangan_proker}}" required />
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                                <a href="{{url('/programkerja')}}" class="btn btn-danger">Batal</a>
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
<script src="/proker/proker.js"></script>
@endforeach
<script>

    function hitung_totalanggaran(){
        var jumlahbaris= document.getElementById('jumlahbaris').value;
        var totalanggaran = 0;
        for(var i=1 ; i<=parseInt(jumlahbaris);i++){
            totalanggaran += parseInt(document.getElementById('jumlah'+i).value);
        }
        document.getElementById('anggaran').value=totalanggaran;
    } 
</script>
@endsection