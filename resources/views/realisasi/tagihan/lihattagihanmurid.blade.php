@extends('template')
@section('container')
<!-- Begin Page Content -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tagihan Murid</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @if (auth()->user()->level=="unit")
            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
            <a href='/tambahtagihanmurid' class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Tambah Data</a>
            <a href="{{url('/tagihan')}}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-sm text-white-50"></i>Kembali</a>
            @endif
        </div>
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        @if (session('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
        @endif

        <br>
        <b> &nbsp;&nbsp; Nomor Induk : {{$tagihans->rincian_nis_tagihan}} <br>
            &nbsp;&nbsp; Nama Murid : {{$tagihans->nama}}
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Tagihan</th>
                                <th>Jumlah Tagihan</th>
                                <th>Aksi</th>
                            </tr>
                        <tbody>
                            @foreach ($tagihan as $item)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ $item->rincian_namakategori_tagihan}}</td>
                                <td>{{ Str::rupiah ($item->rincian_nominal_tagihan)}}</td>
                                @if (auth()->user()->level=="unit")
                                <td>
                                    <a href="/edittagihanmurid/{{$item->id_tagihan}}"><i class="fas fa-edit" style="color:green"></i></a>
                                    <a href="/hapustagihanmurid/{{$item->id_tagihan}}" onclick="return confirm('Yakin hapus data?')"><i class="fas fa-trash-alt" style="color:red"></i></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </thead>
                    </table>
                </div>
            </div>
            </form>
    </div>

</div>

<!-- /.container-fluid -->

@endsection