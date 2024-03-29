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
                            <div class="card-header">Sub Unit</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        @foreach($subunit as $sub)
                                        <form action="/updatesubunit/{{$sub->kode_subunit}}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Kode Sub Unit</label>
                                                <input class="form-control" id="kode_subunit" name="kode_subunit" readonly value="{{$sub->kode_subunit}}" required  />
                                            </div>
                                            <div class="form-group">
                                            <label for="inputLastName">Unit</label>
                                                <select class="form-control select2" style="width: 100%;"name="unit_id" id="unit_id" readonly value="{{$sub->unit_id}}" required>
                                                <option disabled value>Pilih Unit</option>
                                                @foreach ($unit as $item)
                                                <option value="{{ $item->kode_unit}}">{{$item->nama_unit}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Nama Sub Unit</label>
                                                <input class="form-control" id="nama_subunit" name="nama_subunit" readonly value="{{$sub->nama_subunit}}" required />
                                            </div>
                                          
                                            <div class="mb-3">
                                                <label for="inputLastName">Status</label>
                                                <select class="form-control" id="status" name="status" value="{{$sub->status}}"required >
                                                    <option disabled  value>Pilih Status</option>
                                                    <option>AKTIF</option>
                                                    <option>NON AKTIF</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                                <a href="{{url('/subunit')}}" class="btn btn-danger">Batal</a>                                            </div>
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