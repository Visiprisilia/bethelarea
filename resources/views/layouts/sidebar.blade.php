<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="{{asset('template/img/logo2.png')}}" alt="" width="60px;">
        </div>
        <div class="sidebar-brand-text mx-3">Yayasan<sup>
                <p>
                <p>Bethel Area</p>
                </p>
            </sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">


    <li class="nav-item">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>



    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#datamaster" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-solid fa-layer-group"></i>
            <span>Data Master</span>
        </a>
        <div id="datamaster" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Master:</h6>
                <a class="collapse-item" href="/kebijakans">Kebijakan Yayasan</a>
                <a class="collapse-item" href="/unit">Daftar Unit</a>
                <a class="collapse-item" href="/subunit">Daftar Sub Unit</a>
                <a class="collapse-item" href="/periode">Daftar Periode</a>
                <a class="collapse-item" href="/pegawai">Daftar Pegawai</a>
                <a class="collapse-item" href="/murid">Daftar Murid</a>
                <a class="collapse-item" href="/coa">Chart Of Accounts</a>
                <a class="collapse-item" href="/user">User</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#proker" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-solid fa-window-restore"></i>
            <span>Program Kerja</span>
        </a>
        <div id="proker" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Proker dan Evaluasi:</h6>
                <a class="collapse-item" href="/programkerja">Program Kerja</a>
                <a class="collapse-item" href="/evaluasi">Evaluasi</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#realisasi" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-regular fa-money-check"></i>
            <span>Realisasi</span>
        </a>
        <div id="realisasi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Realisasi:</h6>
                <a class="collapse-item" href="/kasbon">Pendaftaran Kas Bon</a>
                <a class="collapse-item" href="/kasmasuk">Kas Masuk</a>
                <a class="collapse-item" href="/kaskeluar">Kas Keluar</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#bukubesar" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-regular fa-book"></i>
            <span>Buku Besar</span>
        </a>
        <div id="bukubesar" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Buku Besar:</h6>
                <a class="collapse-item" href="/bukubesarkas">BB Kas</a>
                <a class="collapse-item" href="/bukubesaranggaran">Buku Besar Anggaran </a>
                <!-- <a class="collapse-item" href="/bukubesaranggaranpendapatan">BB Anggaran Pendapatan</a>
                <a class="collapse-item" href="/bukubesaranggaranbiaya">BB Anggaran Biaya</a> -->
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#laporan" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-solid fa-money-bill"></i> 
            <span>Laporan</span>
        </a>
        <div id="laporan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Laporan:</h6>
                <a class="collapse-item" href="/laporanposisianggaran">Lap. Posisi Anggaran</a>
                <a class="collapse-item" href="/laporankas">Lap. Kas</a>
                <a class="collapse-item" href="/laporanpengkomp">Lap. Peng. Komprehensif</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li> -->



    <!-- Heading -->
    <!-- <div class="sidebar-heading">
        Addons
    </div> -->

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- <li class="nav-item ">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li> -->

    <!-- Nav Item - Charts -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li> -->

    <!-- Nav Item - Tables -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li> -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="/logout">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li> -->

    <!-- Divider -->
    <!-- <hr class="sidebar-divider d-none d-md-block"> -->

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>