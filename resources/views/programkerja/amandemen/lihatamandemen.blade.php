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
                                Konfirmasi Amandemen Program Kerja
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

                                        <form action="/konfirmasiamandemen/{{$items->kode_prokeramandemen}}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Periode</label>
                                                <input class="form-control" id="periode" name="periode" readonly value="{{$items->periode}}" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Kode Proker</label>
                                                <input class="form-control" id="kode_proker" name="kode_proker" readonly value="{{$items->kode_proker}}" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Nama Program Kerja</label>
                                                <input class="form-control" id="nama_proker" name="nama_proker" readonly value="{{$items->nama_proker}}" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Penanggung Jawab</label>
                                                <input class="form-control" id="penanggungjawab" name="penanggungjawab" readonly value="{{$items->penanggungjawab}}" />
                                            </div>

                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Waktu Mulai</label>
                                                    <input class="form-control" type="date" id="waktu_mulai" name="waktu_mulai" readonly value="{{ $items->waktu_mulai}}" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Waktu Selesai</label>
                                                    <input class="form-control" type="date" id="waktu_selesai" name="waktu_selesai" readonly value="{{ $items->waktu_selesai}}" />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Tujuan</label>
                                                    <input class="form-control" id="tujuan" name="tujuan" readonly value="{{ $items->tujuan}}" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Indikator Pencapaian</label>
                                                    <input class="form-control" id="indikator" name="indikator" readonly value="{{ $items->indikator}}" />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlInput1">Anggaran</label>
                                                    <input class="form-control" readonly id="anggaran_amandemen" name="anggaran_amandemen" readonly value="{{ $items->anggaran_amandemen}}" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlInput1">Keterangan</label>
                                                    <input class="form-control" id="keterangan_amandemen" name="keterangan_amandemen" readonly value="{{ $items->keterangan_amandemen}}" />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="mb-1" for="inputFirstName">Status</label>
                                                <select class="form-control" id="status_amandemen" name="status_amandemen">
                                                        <option  value>Pilih Status</option>
                                                        <option value="Disetujui">Disetujui</option>
                                                        <option value="Revisi">Revisi</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6" id="cat" style="display: none;">
                                                    <label class="mb-1" for="inputFirstName">Catatan</label>
                                                    <input class="form-control" id="catatan_amandemen" name="catatan_amandemen" placeholder="Masukkan Catatan" />
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <input type="button" value="Kembali" onclick=self.history.back() class="btn btn-danger">
                                                <button type="submit" class="btn btn-success">Simpan</button>
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

<script>
    $(document).on('change','#status_amandemen',function(){
      var val=$('#status_amandemen option').filter(':selected').val()=="Revisi"?  $('#cat').show():  $('#cat').hide();
    
      //   if(val=="murid"{})  
      // alert(val);
    })
</script>
@endforeach
@endsection