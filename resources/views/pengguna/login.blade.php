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
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                                    </div>
                                    <form action="/postlogin" method="post" class="user">
                                    @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="nama_user" name="nama_user" placeholder="Masukkan Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan Password">
                                        </div>
                                      
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary btn-user btn-block">Masuk</button>
                                        </div>
                                    </form>
                                    <!-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div> -->
                                    <div class="form-group">                                                                               
                                        <a href="/registrasi" class="btn btn-google btn-user btn-block">
                                           Registrasi Akun
                                        </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    @endsection