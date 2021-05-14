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
                            <div class="card-header">Program Kerja Anggaran Pendapatan</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        <form action="/simpanprogramkerjapendapatan" method="post">
                                            @csrf
                                            
                                                <!-- <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Program Kerja</label>
                                                    <select class="form-control" id="pob"  name="pob">
                                                        <option  value>Pilih Program Kerja Anggaran</option>                                              
                                                        <option value="Pendapatan">Anggaran Pendapatan</option>
                                                        <option value="Biaya">Anggaran Biaya</option>
                                                    </select>
                                                </div> -->
                                                <div class="mb-3">
                                                    <label class="mb-1" for="inputLastName">Periode</label>
                                                    <select class="form-control" id="periode"  name="periode">
                                                        <option  value>Pilih Periode</option>
                                                        @foreach ($periode as $item)
                                                        <option value="{{ $item->kode_periode}}">{{$item->nama_periode}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Kode Program Kerja</label>
                                                    <input class="form-control" id="kode_proker" name="kode_proker" placeholder="Masukkan Kode Proker"  />
                                                </div> -->
                                        
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Nama Program Kerja</label>
                                                    <input class="form-control" id="nama_proker" name="nama_proker" placeholder="Masukkan Nama Proker"  />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Penanggung Jawab</label>
                                                    <select class="form-control" id="penanggungjawab" name="penanggungjawab">
                                                        <option  value>Pilih Penanggung Jawab</option>
                                                        @foreach ($pegawai as $item)
                                                        <option value="{{ $item->niy}}">{{$item->nama}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Waktu Mulai</label>
                                                    <input class="form-control" type="date" id="waktu_mulai" name="waktu_mulai"  />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Waktu Selesai</label>
                                                    <input class="form-control" type="date" id="waktu_selesai" name="waktu_selesai"  />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Tujuan</label>
                                                    <input class="form-control" id="tujuan" name="tujuan" placeholder="Masukkan Tujuan"  />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Indikator Pencapaian</label>
                                                    <input class="form-control" id="indikator" name="indikator" placeholder="Masukkan Indikator"  />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlInput1">Akun</label>
                                                    <button type="button" class="btn btn-primary ml-2" id="tambah">+</button>
                                                    <div id="selectakun">
                                                        <div class="form-group" id="akun" name="akun">
                                                            <select class="form-control select2 mb-1" style="width: 100%;" name="akun[]">
                                                                <option  value>Pilih Akun</option>
                                                                @foreach ($coa as $item)
                                                                <option value="{{ $item->kode_akun}}">{{ $item->kode_akun}} - {{$item->nama_akun}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div>
                                                            <input type="text" class="form-control mb-1 jumlah" onkeyup="tambah_anggaran()" type-currency="IDR" id="jumlah0" name="jumlah[]" placeholder="Masukkan Jumlah">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlInput1">Anggaran</label>
                                                    <input class="form-control" readonly id="anggaran" name="anggaran"  />
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Keterangan</label>
                                                <input class="form-control" id="keterangan_proker" name="keterangan_proker" placeholder="Masukkan Keterangan"   />
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Tambah</button>
                                                <a href="{{url('/programkerja')}}" class="btn btn-danger">Batal</a>
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
    document.querySelectorAll('input[type-currency="IDR"]').forEach((element) => {
        element.addEventListener('keyup', function(e) {
            let cursorPostion = this.selectionStart;
            console.info(cursorPostion);
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

    $(document).on('click', '#tambah', function() {
        const item = <?php echo json_encode($coa); ?>;
        iJumlah++;
        var akun = '<div class="form-group" id="akun" name="akun"><select class="form-control select2 mb-1" style="width: 100%;" name="akun[]">' +
            '<option  value>Pilih Akun</option>';
        item.forEach((e) => {
            akun += '<option value="' + e.kode_akun + '">' + e.kode_akun + ' - ' + e.nama_akun + '</option>'
        });
        akun += '</select><div><input type="text"  ' +
            'class="form-control mb-1 jumlah" type-currency="IDR" id="jumlah' + iJumlah + '" onkeyup="test_rp(' + iJumlah + ');" name="jumlah[]" ' +
            'placeholder="Masukkan Jumlah" ></div></div>';
        $("#selectakun").append(akun);
    })
</script>
<!-- $string = str_replace(array(‘Rp’, ‘.’ ), ”, $_POST[‘angka’]); -->
<!-- type-currency="IDR" -->
@endsection