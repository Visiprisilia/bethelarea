@extends('template')
@section('container')
<!-- Begin Page Content -->
<!-- <div class="container-fluid"> -->

<!-- <body> -->
<h4 style="color:Tomato;" >Selamat Datang, {{ auth()->user()->nama_lengkap }} </h4>

  <p>
    <img src="{{asset('template/img/home2.jpeg')}}"  alt="" width="1210px;" />
  </p>

<!-- </body> -->
<!-- </div>
 <li class="nav-item">
        <a class="nav-link" href="hum">
        <i class='fas fa-id-card-alt'></i>
            <span>Tagihan</span></a>
    </li> -->

        <!-- /.container-fluid -->
        @endsection
