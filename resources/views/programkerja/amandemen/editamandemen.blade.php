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
                                Ubah Amandemen Program Kerja
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
                            <div class="card-header">Amandemen Program Kerja</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        @foreach($amandemen as $items)

                                        <form action="/updateamandemen/{{$items->kode_prokeramandemen}}" method="post">
                                            @csrf
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-8">
                                                    <label class="mb-1" for="inputLastName">Periode</label>
                                                    <input class="form-control" id="periode" name="periode" placeholder="Masukkan Nama Proker" value="{{ $items->periode}}" readonly />

                                                    <!-- <select class="form-control" id="periode" require name="periode" value="{{ $items->periode}}" required>
                                                        <option value>Pilih Periode</option>
                                                        @foreach ($periode as $item)
                                                        <option value="{{ $item->kode_periode}}">{{$item->nama_periode}}</option>
                                                        @endforeach
                                                    </select> -->
                                                </div>
                                                <!-- <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Kode Program Kerja</label>
                                                    <input class="form-control" id="kode_proker" name="kode_proker" placeholder="Masukkan Kode Proker" required />
                                                </div> -->
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Nama Program Kerja</label>
                                                    <input class="form-control" id="nama_proker" name="nama_proker"  placeholder="Masukkan Nama Proker" value="{{ $items->nama_proker}}"  />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Penanggung Jawab</label>
                                                    <input class="form-control" id="penanggungjawabs" name="penanggungjawabs" placeholder="Masukkan Nama Proker" value="{{ $items->nama}}" readonly />
                                                    <input class="form-control" id="penanggungjawab" hidden name="penanggungjawab" placeholder="Masukkan Nama Proker" value="{{ $items->penanggungjawab}}" readonly />
                                                    <!-- <select class="form-control" id="penanggungjawab" name="penanggungjawab" value="{{ $items->penanggungjawab}}" required>
                                                        <option value>Pilih Penanggung Jawab</option>
                                                        @foreach ($pegawai as $item)
                                                        <option value="{{ $item->niy}}">{{$item->nama}}</option>
                                                        @endforeach
                                                    </select> -->
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Waktu Mulai</label>
                                                    <input class="form-control" type="date" id="waktu_mulai"  name="waktu_mulai" value="{{ $items->waktu_mulai}}"  />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Waktu Selesai</label>
                                                    <input class="form-control" type="date" id="waktu_selesai"  name="waktu_selesai" value="{{ $items->waktu_selesai}}"  />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Tujuan</label>
                                                    <input class="form-control" id="tujuan"   name="tujuan" value="{{ $items->tujuan}}"  />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Indikator Pencapaian</label>
                                                    <input class="form-control" id="indikator"  name="indikator" value="{{ $items->indikator}}"  />
                                                </div>
                                            </div>
                                            <?php $j = 1;

                                            ?>
                                            @foreach($akun as $akuns)
                                            <div class="row gx-3 mb-3">
                                                <input class="form-control" hidden readonly id="id<?=$j?>" name="id<?=$j?>" value="{{ $akuns->id}}" required />

                                                <div class="col-md-6">
                                                    <label for="exampleFormControlInput1">Akun</label>
                                                    <input class="form-control" readonly id="kode_akuns<?=$j?>" name="kode_akuns<?=$j?>" value="{{ $akuns->nama_akun}}" required />
                                                    <input class="form-control" readonly id="kode_akun<?=$j?>" hidden name="kode_akun<?=$j?>" value="{{ $akuns->kode_akun}}" required />
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlInput1">Anggaran</label>
                                                    <input class="form-control" id="jumlah<?=$j?>" name="jumlah<?=$j?>" value="{{ $akuns->jumlah}}" required required onblur="hitung_totalanggaran()" />
                                                </div>
                                            </div>
                                            <?php $j++;
                                                ?>
                                            @endforeach
                                            <input class="form-control" hidden readonly id="jumlahbaris" name="jumlahbaris" value="<?=$j-1?>"  required />                                                                                                                         
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlInput1">Jumlah Anggaran</label>
                                                    <input class="form-control" id="anggaran_amandemen" readonly name="anggaran_amandemen" value="{{ $items->anggaran_amandemen}}" required />
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Keterangan</label>
                                                <input class="form-control" id="keterangan_amandemen"   name="keterangan_amandemen" value="{{ $items->keterangan_amandemen}}" required />
                                            </div>

                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                                <input type="button" value="Kembali" onclick=self.history.back() class="btn btn-danger">
                                            </div>
                                        </form>

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

<script>
    $(document).on('change', '#status_amandemen', function() {
        var val = $('#status_amandemen option').filter(':selected').val() == "Revisi" ? $('#cat').show() : $('#cat').hide();

        //   if(val=="murid"{})  
        // alert(val);
    })
</script>
<script>
    function hitung_totalanggaran(){
        var jumlahbaris= document.getElementById('jumlahbaris').value;
        var totalanggaran = 0;
        for(var i=1 ; i<=parseInt(jumlahbaris);i++){
            totalanggaran += parseInt(document.getElementById('jumlah'+i).value);
        }
        document.getElementById('anggaran_amandemen').value=totalanggaran;
    } 
</script>
@endforeach
@endsection