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
                            <div class="card-header">User</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        @foreach($user as $item)
                                        <form action="/updateuser/{{$item->id}}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Nama Pengguna</label>
                                                <input class="form-control" id="nama_pengguna" name="nama_pengguna" value="{{$item->nama_pengguna}}"  />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Username</label>
                                                <input class="form-control" id="nama_user" name="nama_user" value="{{$item->nama_user}}"    />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Password</label>
                                                <input class="form-control" id="password" name="password" value="{{$item->password}}"   />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Level</label>
                                                <input class="form-control" id="level" name="level" value="{{$item->level}}"   />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Status</label>
                                                <input class="form-control" id="status" name="status" value="{{$item->status}}"   />
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                                <a href="{{url('/unit')}}" class="btn btn-danger">Batal</a>                                            </div>
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