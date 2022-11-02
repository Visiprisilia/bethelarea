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

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
                Data Master
            </div> -->

    <!-- Nav Item - Pages Collapse Menu -->
    @if(auth()->user()->level=="super admin")
    <!-- Nav Item - kebijakan -->
    <li class="nav-item">
        <a class="nav-link" href="/kebijakan">
            <i class="fas fa-solid fa-pen-nib"></i>
            <span>Kebijakan Yayasan</span></a>
    </li>
    <!-- Nav Item - unit -->
    <li class="nav-item">
        <a class="nav-link" href="/unit">
            <i class="fas fa-solid fa-landmark"></i>
            <span>Unit</span></a>
    </li>
    <!-- Nav Item - periode -->
    <li class="nav-item">
        <a class="nav-link" href="/periode">
            <i class="fas fa-solid fa-calendar"></i>
            <span>Periode</span></a>
    </li>
    <!-- Nav Item - pegawai -->
    <li class="nav-item">
        <a class="nav-link" href="/pegawai">
            <i class="fas fa-solid fa-users"></i>
            <span>Pegawai</span></a>
    </li>
    <!-- Nav Item - pegawai -->
    <li class="nav-item">
        <a class="nav-link" href="/murid">
            <i class="fas fa-solid fa-child"></i>
            <span>Murid</span></a>
    </li>
    <!-- Nav Item - coa -->
    <li class="nav-item">
        <a class="nav-link" href="/coa">
            <i class="fas fa-solid fa-book"></i>
            <span>Chart Of Account</span></a>
    </li>
    
           <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-regular fa-money-check"></i> 
            <span>Program Kerja</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Program Kerja:</h6>
                <a class="collapse-item" href="/pengajuan">Pengajuan</a>
                <a class="collapse-item" href="/validasi">Validasi</a>
                <a class="collapse-item" href="/realisasi">Realisasi</a>
            </div>
        </div>
    </li> 
    <!-- Nav Item - anggaran -->
    <li class="nav-item">
        <a class="nav-link" href="/pengajuan">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Anggaran</span></a>
    </li>
    <!-- Nav Item - user -->
    <li class="nav-item">
        <a class="nav-link" href="/user">
            <i class="fas fa-solid fa-user"></i>
            <span>User</span></a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider">
   
    @elseif(auth()->user()->level=="yayasan")
    <!-- Nav Item - kebijakan -->
    <li class="nav-item">
        <a class="nav-link" href="/kebijakan">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Kebijakan Yayasan</span></a>
    </li>
    @elseif(auth()->user()->level=="pegawai")
    <!-- Nav Item - pengajuan -->
    <li class="nav-item">
        <a class="nav-link" href="/pengajuan">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Pengajuan</span></a>
    </li>
    @endif

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