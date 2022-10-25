@extends('pengguna.templatepengguna')
@section('container')

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                    <div class="col-lg-5">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Buat Akun</h1>
                            </div>
                            <form action="/simpanregistrasi" method="post" class="user">      
                            @csrf                          
                                <div class="form-group">
                                    <input type="type" class="form-control form-control-user" id="name" name="name" placeholder="Masukkan Nama">
                                </div>                                
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan Alamat Email">
                                </div>     
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan Password">
                                </div>                              
                                 <div class="mb-3">
                                            <button type="submit" class="btn btn-primary btn-user btn-block">Register Akun</button>
                                        </div>
                                <hr>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="/bethelarea">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endsection