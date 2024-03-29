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
                            <div class="card-header">Tagihan Murid</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        @foreach($tagihan as $itemss)
                                        <form action="/updatetagihanmurid/{{$itemss->id_itemtagihan}}" method="post">
                                            @csrf

                                            <input class="form-control" id="id_tagihan" name="id_tagihan" hidden value="{{$itemss->id_tagihan}}" placeholder="Masukkan Jumlah Tagihan" />

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
                                                <input class="form-control" id="nominal_tagihan" type-currency="IDR" name="nominal_tagihan" value="{{$itemss->nominal_tagihan}}" placeholder="Masukkan Jumlah Tagihan" />
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Simpan</button>
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
<script src="/proker/kasbon.js"></script>
@endforeach
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