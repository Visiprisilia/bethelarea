@extends('pengguna.templatepengguna')
@section('container')

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-3 col-md-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Buat Akun</h1>
                                    </div>
                                    <form action="/simpanregistrasi" method="post" class="user">
                                        @csrf
                                        <div class="form-group">
                                            <input class="form-control form-control-user" id="nama_user" name="nama_user" placeholder="Masukkan Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan Password">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-user" id="level" name="level" placeholder="Masukkan Level">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-user" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap">
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-facebook btn-user btn-block">Register Akun</button>
                                        </div>
                                    </form>
                                    <div class="form-group">
                                        <a class="btn btn-google btn-user btn-block" href="/bethelarea">Sudah Punya Akun? Masuk!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @endsection