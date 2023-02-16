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
                                        <form action="/simpandaftartagihan" method="post">
                                            @csrf
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Periode</label>
                                                    <select class="form-control" id="periode_tagihan" name="periode_tagihan">
                                                        <option value>Pilih Periode</option>
                                                        @foreach ($periode as $item)
                                                        <option value="{{ $item->kode_periode}}">{{$item->nama_periode}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Murid</label>
                                                    <select class="form-control" id="nis_tagihan" name="nis_tagihan">
                                                        <option value>Pilih Murid</option>
                                                        @foreach ($murid as $item)
                                                        <option value="{{ $item->nomor_induk}}">{{$item->nomor_induk}} {{$item->nama}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                           
                                                <!-- <div class="col-md-6">
                                                    <label for="exampleFormControlInput1">Uang Lain-lain</label>
                                                    <input class="form-control" id="uang_lainlain" name="uang_lainlain" />
                                                </div> -->
                                           

                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Tambah</button>
                                                <a href="{{url('/tagihan')}}" class="btn btn-danger">Batal</a>
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