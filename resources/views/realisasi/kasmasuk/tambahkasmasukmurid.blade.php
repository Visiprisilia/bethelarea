@extends('template')
@section('container')
<!-- Default Bootstrap Form Controls-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                            <div class="card-header">Kas Masuk Murid</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        <form action="/simpankasmasukmurid" method="post">
                                            @csrf
                                            <!-- <div class="mb-3">
                                                <label for="exampleFormControlInput1">No Bukti</label>
                                                <input class="form-control" id="no_bukti" name="no_bukti"/>
                                            </div> -->
                                            <div class="row gx-3 mb-3">
                                            <div class="col-md-8">
                                            <label class="mb-1" for="inputLastName">Periode</label>
                                                <select class="form-control" id="periode" name="periode">
                                                    <option value>Pilih Periode</option>
                                                    @foreach ($periode as $item)
                                                    <option value="{{ $item->kode_periode}}">{{$item->nama_periode}}</option>
                                                    @endforeach
                                                </select>
                                            </div></div>
                                            <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                            <label class="mb-1" for="inputLastName">Murid</label>
                                                <select class="form-select" id="kasir" name="kasir">
                                                    <!-- <option value>Pilih Murid</option>
                                                    @foreach ($murid as $item)
                                                    <option value="{{ $item->nomor_induk}}">{{$item->nomor_induk}} - {{$item->nama}} </option>
                                                    @endforeach -->
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Jenis Tagihan</label>
                                                    <select class="form-control" id="akun" name="akun">
                                                        <!-- <option value>Pilih Jenis Tagihan</option>
                                                        @foreach ($akun as $item)
                                                        <option value="{{ $item->kode_akun}}">{{$item->kode_akun}} - {{$item->nama_akun}}</option>
                                                        @endforeach -->
                                                    </select>
                                                </div></div>
                                            <div class="row gx-3 mb-3">
                                            <!-- <div class="col-md-6">
                                                <label for="exampleFormControlInput1">Total Tagihan</label>
                                                <input class="form-control" readonly id="tagihan" name="tagihan" />
                                            </div> -->
                                            <div class="col-md-6">
                                                <label for="exampleFormControlInput1">Jumlah</label>
                                                <input class="form-control" id="jumlah" name="jumlah" type-currency="IDR" placeholder="Masukkan Jumlah" />
                                            </div>
                                            <!-- <div class="mb-3">
                                                <label for="exampleFormControlInput1">Tanggal Pencatatan</label>
                                                <input class="form-control" type="date" id="tanggal_pencatatan" name="tanggal_pencatatan"  />
                                            </div>   -->
                                            <div class="col-md-6">
                                                <label for="exampleFormControlInput1">Keterangan</label>
                                                <input class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan" />
                                            </div>                                       
                                            <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label for="exampleFormControlInput1">Diterima dari :</label>
                                                <input class="form-control" id="diterimadari" name="diterimadari" placeholder="Diterima dari.." />
                                            </div>                                   
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Tambah</button>
                                                <a href="{{url('/kasmasuk')}}" class="btn btn-danger">Batal</a>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="/proker/kasmasuk.js"></script>

<script>
        $(document).ready(function(){
            $("#kasir").select2({
                placeholder:'Pilih Murid',
                ajax: {
                    url:"{{route('pilihmurid.index')}}",
                    processResults: function({data}){
                        return {
                            results: $.map(data, function(item){
                                return {
                                    id: item.nomor_induk,
                                    text: item.nama
                                }
                            })
                        }
                    }
                }
            });
            $("#kasir").change(function(){
                let nomor_induk = $('#kasir').val();

                $("#akun").select2({
                placeholder:'Pilih Tagihan',
                ajax: {
                    url: "{{url('pilihtagihan')}}/"+nomor_induk,
                    processResults: function({data}){
                        return {
                            results: $.map(data, function(item){
                                return {
                                    id: item.rincian_namakategori_tagihan,
                                    text: item.nama_akun
                                }
                            })
                        }
                    }
                }
            });
            });
        });
            </script>
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