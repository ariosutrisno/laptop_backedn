<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
        <img src="{{ asset('img/logonav.png') }}" alt="logo laptop" height="50px" width="50px">
        </div>
        <div class="sidebar-brand-text mx-1">ADMIN DATA LAPTOP</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Input
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Data Laptop</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Laptop</h6>
                <a class="collapse-item" href="{{ route('datalaptop') }}">Data Laptop</a>
                <a class="collapse-item" href="{{ route('getKriteria') }}">Data Kriteria</a>
                <a class="collapse-item" href="{{ route('getAlternatif') }}">Data Alternatif & Utility</a>
                <a class="collapse-item" href="{{ route('perhitungan') }}">Hasil Perhitungan</a>
                {{-- <a class="collapse-item" href="{{ route('getRangking') }}">Ranking</a> --}}
                <a class="collapse-item" href="{{ route('datarekomendasi') }}">Data Request Customer</a>
            </div>
        </div>
    </li>

    
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-database"></i>
            <span>Sub Kriteria</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Sub Kriteria :</h6>
                <a class="collapse-item" href="{{ route('dataram') }}">RAM</a>
                <a class="collapse-item" href="{{ route('dataprosesor') }}">PROCESSOR</a>
                <a class="collapse-item" href="{{ route('datadisplay') }}">DISPLAY</a>
                <a class="collapse-item" href="{{ route('datastorage') }}">STORAGE</a>
                <a class="collapse-item" href="{{ route('datavga') }}">VGA</a>
                <a class="collapse-item" href="{{ route('dataharga') }}">HARGA</a>
                
            </div>
        </div>
    </li>
    
        <!-- Nav Item - Utilities Collapse Menu -->
        {{-- <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Utilities</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Utilities :</h6>
                    <a class="collapse-item" >User</a>
                    <a class="collapse-item" href="#">Print</a>
                    
                    
                </div>
            </div>
        </li> --}}
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Admin</span>
        </a>
        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="">Login</a>
                <a class="collapse-item" href="">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>