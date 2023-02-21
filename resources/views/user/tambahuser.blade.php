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
                            <div class="card-header">User</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        <form action="/simpanuser" method="post">
                                            @csrf                                           
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Nama Lengkap</label>
                                                <input class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap"  />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Username</label>
                                                <input class="form-control" id="nama_user" name="nama_user" placeholder="Masukkan Username"  />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Password</label>
                                                <input class="form-control" type="password" id="password" name="password" placeholder="Masukkan Password"  />
                                            </div>
                                            <div class="mb-3">
                                            <label class="mb-1" for="inputFirstName">Level</label>
                                                    <select class="form-control" id="level" name="level">
                                                        <option value>Pilih Level</option>
                                                        <option value="super admin">Super Admin</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="yayasan">Yayasan</option>
                                                        <option value="murid">Murid</option>
                                                    </select>
                                            </div>
                                            <div class="mb-3">
                                            <label class="mb-1" for="inputFirstName">Status</label>
                                                    <select class="form-control" id="status" name="status">
                                                        <option value>Pilih Status</option>
                                                        <option value="AKTIF">AKTIF</option>
                                                        <option value="NON AKTIF">NON AKTIF</option>
                                                    </select>
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Tambah</button>
                                                <a href="{{url('/user')}}" class="btn btn-danger">Kembali</a>
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
@endsection