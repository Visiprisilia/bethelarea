@extends('template')
@section('container')
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
<!-- <style>
      /* Works for Chrome, Safari, Edge, Opera */
      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }

      /* Works for Firefox */
      input[type="number"] {
        -moz-appearance: textfield;
      }
    </style> -->
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
                            <div class="card-header">Kas Keluar</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        <form action="/simpankaskeluar" method="post" enctype="multipart/form-data">
                                            @csrf
                                      
                                            <div class="mb-3">
                                                <label class="mb-1" for="inputLastName">Periode</label>
                                                <select class="form-control" id="periode" name="periode">
                                                    <option value>Pilih Periode</option>
                                                    @foreach ($periode as $item)
                                                    <option value="{{ $item->kode_periode}}">{{$item->nama_periode}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!-- <div class="mb-3">
                                                <label for="exampleFormControlInput1">Tanggal</label>
                                                <input class="form-control" type="date" id="tanggal_pencatatan" name="tanggal_pencatatan" required/>
                                            </div>   -->
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Keterangan</label>
                                                <input class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan" />
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Program Kerja</label>
                                                    <select class="form-select" id="prokers" name="prokers">
                                                        <!-- <option  value>Pilih Program Kerja</option>
                                                        @foreach ($programkerja as $item)
                                                        <option value="{{ $item->kode_proker}}">{{$item->kode_proker}} - {{$item->nama_proker}}</option>
                                                        @endforeach -->
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Akun</label>
                                                    <select class="form-select" id="akun" name="akun">
                                                        <!-- <option  value>Pilih Akun</option>
                                                        @foreach ($akun as $item)
                                                        <option value="{{ $item->kode_akun}}">{{$item->kode_proker}} - {{$item->kode_akun}}</option>
                                                        @endforeach -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6" id="prok">
                                                    <!-- <label class="mb-1" for="inputFirstName">Program Kerja</label> -->
                                                    <!-- <input class="form-control" readonly id="totalkas" name="totalkas" value="{{$totalkas}}" /> -->
                                                </div>
                                                <div class="col-md-6" id="akbon">
                                                    <!-- <label class="mb-1" for="inputFirstName">Akun</label> -->
                                                    <!-- <input class="form-control" readonly id="anggaran" name="anggaran"   /> -->
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class="mb-1" for="inputFirstName">Saldo Kas</label>
                                                    <input class="form-control" readonly id="totalkas" name="totalkas" value="{{$totalkas}}"/>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="mb-1" for="inputFirstName">Anggaran Proker</label>
                                                    <input class="form-control" readonly id="anggarans" name="anggarans" />
                                                </div>
                                                <div class="col-md-3" >
                                                    <label class="mb-1" for="inputFirstName">Anggaran Akun</label>
                                                    <input class="form-control" readonly id="anggaran" name="anggaran"/>
                                                </div>                                                
                                                <div class="col-md-3">
                                                    <label class="mb-1" for="inputFirstName">Jumlah</label>
                                                    <input class="form-control" id="jumlah" name="jumlah" type="text" placeholder="Masukkan Jumlah" />
                                                </div>
                                            </div>

                                            <div class="row gx-3 mb-3">                                               
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Penanggung Jawab :</label>
                                                    <!-- <input class="form-control" readonly id="penanggungjawabs" name="penanggungjawabs"  placeholder="Penanggung jawab"  /> -->
                                              
                                                    <input class="form-control" readonly id="penanggungjawab"  name="penanggungjawab" placeholder="Penanggung jawab" />
                                                </div>
                                                <div class="col-md-6" >
                                                    <label class="mb-1" for="inputFirstName"></label>
                                                    <input class="form-control" readonly id="penanggungjawabs" name="penanggungjawabs"  placeholder="Penanggung jawab"  />                                              
                                                    <!-- <input class="form-control" readonly id="penanggungjawab"  name="penanggungjawab"  /> -->
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Bukti</label>
                                                    <input class="form-control" type="file" id="bukti" name="bukti" placeholder="Masukkan Jumlah" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Dibayar Kepada :</label>
                                                    <input class="form-control" id="kasir" name="kasir" placeholder="Dibayar Kepada" />
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Tambah</button>
                                                <a href="{{url('/kaskeluar')}}" class="btn btn-danger">Batal</a>
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
<script src="/proker/kaskeluar.js"></script>
<script>
    // function set_max(){
    //     let kas = parseInt(document.getElementById('totalkas').value);
    //     let anggarans = parseInt(document.getElementById('anggarans').value);
    //     let anggaran = parseInt(document.getElementById('anggaran').value);
    //     var total = kas+anggaran+anggarans;
    //     document.getElementById("jumlah").max=total;
    //     // console.log(total);
    // }

    $(document).ready(function() {
        $("#prokers").select2({
            placeholder: 'Pilih Proker',
            ajax: {
                url: "{{route('pilihproker.index')}}",
                processResults: function({
                    data
                }) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                id: item.kode_proker,
                                text: item.nama_proker
                            }
                        })
                    }
                }
            }
        });
        $("#prokers").change(function() {
            let kode_proker = $('#prokers').val();

            $("#akun").select2({
                placeholder: 'Pilih Akun',
                ajax: {
                    url: "{{url('pilihakun')}}/" + kode_proker,
                    processResults: function({
                        data
                    }) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.kode_akun,
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
<script>
    $(document).on('change', '#no_bukti', function() {
        var val = $('#no_bukti option').filter(':selected').val() == "?" ? $('#prokers').show() : $('#prokers').select2().next().hide();
        var val = $('#no_bukti option').filter(':selected').val() == "?" ? $('#akun').show() : $('#akun').hide();
    })
</script>
@endsection