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
                            <div class="card-header">Tagihan Murid</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                    
                                        <form action="/simpantagihanmurid" method="post">
                                            @csrf
                                                <input class="form-control" id="id_tagihan" name="id_tagihan" value="{{$tagihans->id_tagihan}}" hidden  placeholder="Masukkan Jumlah Tagihan" />
                                            <div class="mb-3">
                                                    <label class="mb-1" for="inputLastName">Jenis Tagihan</label>
                                                    <select class="form-control" id="kode_akun" name="kode_akun">
                                                        <option value>Pilih Jenis Tagihan</option>
                                                        @foreach ($coa as $item)
                                                        <option value="{{ $item->kode_akun}}">{{ $item->kode_akun}} - {{$item->nama_akun}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                <label for="exampleFormControlInput1">Jumlah Tagihan</label>
                                                <input class="form-control" id="nominal_tagihan" name="nominal_tagihan" placeholder="Masukkan Jumlah Tagihan" />
                                            </div>    
                                           
                                                <!-- <div class="col-md-6">
                                                    <label for="exampleFormControlInput1">Uang Lain-lain</label>
                                                    <input class="form-control" id="uang_lainlain" name="uang_lainlain" />
                                                </div> -->
                                           

                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Tambah</button>
                                                <!-- <a href="{{url('/lihattagihanmurid/{rincian_nis_tagihan}')}}" class="btn btn-danger">Batal</a> -->
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
        </div>
    </main>
</div>
<script src="/proker/kasmasuk.js"></script>

<script>
    $(document).on('change', '#sumber', function() {
        var val = $('#sumber option').filter(':selected').val() == "1" ? $('#murid').show() : $('#murid').hide();

        //   if(val=="murid"{})  
        // alert(val);
    })
</script>
<script>
    $(document).on('change', '#sumber', function() {
        var val = $('#sumber option').filter(':selected').val() == "3" ? $('#donatur').show() : $('#donatur').hide();

        //   if(val=="murid"{})  
        // alert(val);
    })
</script>
@endsection