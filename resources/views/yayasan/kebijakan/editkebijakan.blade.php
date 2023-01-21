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
                            <div class="card-header">Kebijakan Yayasan</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                    @foreach($kebijakan as $item)
                                    <form action="/updatekebijakan/{{$item->kode_kebijakan}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <!-- <div class="mb-3">
                                                <label for="exampleFormControlInput1">Kode</label>
                                                <input class="form-control" id="kode_kebijakan" name="kode_kebijakan" disabled value="{{$item->kode_kebijakan}}" placeholder="Kode pegawai" />
                                            </div> -->
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">File Kebijakan</label>
                                                <input class="form-control" type="file" id="file_kebijakan" name="file_kebijakan" value="{{$item->file_kebijakan}}" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Keterangan</label>
                                                <input class="form-control" id="keterangan" name="keterangan" value="{{$item->keterangan}}"  />
                                            </div>                                                                                    
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                                <a href="{{url('/kebijakans')}}" class="btn btn-danger">Batal</a>                                            </div>
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