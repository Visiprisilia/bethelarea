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
                                Pertanggungjawaban Bon
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
                            <div class="card-header">Kas Bon</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                    @foreach($kasbon as $itemss)
                                        <form action="/updatekasbon/{{$itemss->no_bukti}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                            <label class="mb-1" for="inputFirstName">Periode</label>
                                                <input class="form-control" id="periode" value="{{ $itemss->periode}}" name="periode" readonly placeholder="Masukkan Keterangan" />
                                                <input class="form-control" id="tanggal_pengajuan" name="tanggal_pengajuan" value="{{ $itemss->tanggal_pengajuan}}" hidden />                                            
                                                <input class="form-control" id="dibayarkepada" name="dibayarkepada" value="{{ $itemss->dibayarkepada}}" hidden />                                            
                                                <input class="form-control" id="bukti_bon" name="bukti_bon" value="{{ $itemss->bukti_bon}}" hidden />                                            
                                            </div>
                                            <div class="mb-3">
                                                <label class="mb-1" for="inputFirstName">Keterangan</label>
                                                <input class="form-control" id="keterangan_bon" value="{{ $itemss->keterangan_bon}}" readonly name="keterangan_bon" placeholder="Masukkan Keterangan" />
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6" >
                                                    <label class="mb-1" for="inputFirstName">Program Kerja</label>
                                                    <input class="form-control" readonly id="proker_bons" name="proker_bons" value="{{ $itemss->nama_proker}}"/>
                                                    <input class="form-control" readonly id="proker_bon" hidden name="proker_bon" value="{{ $itemss->proker_bon}}"/>
                                                </div>
                                                <div class="col-md-6" id="akun_bon">
                                                    <label class="mb-1" for="inputFirstName">Akun</label>
                                                    <input class="form-control" readonly id="akun_bons" name="akun_bons"value="{{ $itemss->nama_akun}}" />
                                                    <input class="form-control" readonly id="akun_bon" hidden name="akun_bon"value="{{ $itemss->akun_bon}}" />
                                                    <input class="form-control" readonly id="anggaran_bon" hidden name="anggaran_bon"value="{{ $itemss->anggaran_bon}}" />

                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Jumlah Bon</label>
                                                    <input class="form-control" id="jumlah_bon"  readonly name="jumlah_bon" value="{{ $itemss->jumlah_bon}}" placeholder="Masukkan Jumlah" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Jumlah Pertanggungjawaban</label>
                                                    <input class="form-control"  id="jumlah_bon" name="jumlah_bon" type-currency="IDR"  />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Bukti</label>
                                                    <input class="form-control" type="file" id="bukti_ptj" name="bukti_ptj" placeholder="Masukkan penanggung jawab"  />
                                                </div>
                                                <div class="col-md-6">
                                                <label class="mb-1" for="inputFirstName">Penanggungjawab</label>
                                                    <input class="form-control"  id="penanggungjawab_bons" name="penanggungjawab_bons" value="{{ $itemss->nama}}" readonly  />
                                                    <input class="form-control"  id="penanggungjawab_bon" hidden name="penanggungjawab_bon" value="{{ $itemss->penanggungjawab_bon}}" readonly  />
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Tambah</button>
                                                <a href="{{url('/kasbon')}}" class="btn btn-danger">Batal</a>
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
@endforeach
<script src="/proker/kasbon.js"></script>
<script>
    document.querySelectorAll('input[type-currency="IDR"]').forEach((element) => {
        element.addEventListener('keyup', function(e) {
            let cursorPostion = this.selectionStart;
            let value = parseInt(this.value.replace(/[^,\d]/g, ''));
            let originalLenght = this.value.length;
            if (isNaN(value)) {
                this.value = "";
            } else {
                this.value = value.toLocaleString('id-ID', {
                    currency: 'IDR',
                    // style: 'currency',
                    minimumFractionDigits: 0
                });
                cursorPostion = this.value.length - originalLenght + cursorPostion;
                this.setSelectionRange(cursorPostion, cursorPostion);
            }
        });
    });
</script>
<!-- $string = str_replace(array(‘Rp’, ‘.’ ), ”, $_POST[‘angka’]); -->
<!-- type-currency="IDR" -->
@endsection