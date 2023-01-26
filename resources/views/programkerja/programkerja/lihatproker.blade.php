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
                                Konfirmasi Program Kerja
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

                                        <form action="/konfirmasi/{{$items->kode_proker}}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Periode</label>
                                                <input class="form-control" id="periode" name="periode" disabled value="{{$items->periode}}" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Kode Proker</label>
                                                <input class="form-control" id="kode_proker" name="kode_proker" disabled value="{{$items->kode_proker}}" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Nama Program Kerja</label>
                                                <input class="form-control" id="nama_proker" name="nama_proker" disabled value="{{$items->nama_proker}}" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Penanggung Jawab</label>
                                                <input class="form-control" id="penanggungjawab" name="penanggungjawab" disabled value="{{$items->penanggungjawab}}" />
                                            </div>

                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Waktu Mulai</label>
                                                    <input class="form-control" type="date" id="waktu_mulai" name="waktu_mulai" disabled value="{{ $items->waktu_mulai}}" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Waktu Selesai</label>
                                                    <input class="form-control" type="date" id="waktu_selesai" name="waktu_selesai" disabled value="{{ $items->waktu_selesai}}" />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Tujuan</label>
                                                    <input class="form-control" id="tujuan" name="tujuan" disabled value="{{ $items->tujuan}}" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Indikator Pencapaian</label>
                                                    <input class="form-control" id="indikator" name="indikator" disabled value="{{ $items->indikator}}" />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlInput1">Anggaran</label>
                                                    <input class="form-control" readonly id="anggaran" name="anggaran" disabled value="{{ $items->anggaran}}" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlInput1">Keterangan</label>
                                                    <input class="form-control" id="keterangan_proker" name="keterangan_proker" disabled value="{{ $items->keterangan_proker}}" />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="mb-1" for="inputFirstName">Status</label>
                                                <select class="form-control" id="status_proker" name="status_proker">
                                                        <option  value>Pilih Status</option>
                                                        <option value="Disetujui">Disetujui</option>
                                                        <option value="Revisi">Revisi</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6" id="cat" style="display: none;">
                                                    <label class="mb-1" for="inputFirstName">Catatan</label>
                                                    <input class="form-control" id="catatan" name="catatan" />
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <input type="button" value="Kembali" onclick=self.history.back() class="btn btn-success">
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
    $(document).on('change','#status_proker',function(){
      var val=$('#status_proker option').filter(':selected').val()=="Revisi"?  $('#cat').show():  $('#cat').hide();
    
      //   if(val=="murid"{})  
      // alert(val);
    })
</script>
@endforeach
@endsection