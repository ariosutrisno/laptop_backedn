@extends('Web.LayoutPage.app')
@section('title','All Data Laptop')
@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('Web.LayoutPage.navbarside')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        

                        <!-- Nav Item - User Information -->
                        @include('Web.LayoutPage.profileHeader')

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid ">
                    
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Data Laptop View</h1>
                    <div class="overflow-auto">

                        <div id="demo" class="carousel slide" data-ride="carousel">
    
                            <!-- Indicators -->
                            <ul class="carousel-indicators">
                              <li data-target="#demo" data-slide-to="0" class="active"></li>
                              <li data-target="#demo" data-slide-to="1"></li>
                              <li data-target="#demo" data-slide-to="2"></li>
                            </ul>
                          
                            <!-- The slideshow -->
                            <div class="carousel-inner">
                              <div class="carousel-item active" data-interval="3000">
                                <img src="{{ asset($ViewData->gambar) }}"  width="100px" class="d-block w-50">
                              </div>
                              <div class="carousel-item">
                                <img src="{{ asset($ViewData->gambar) }}"  width="100px" class="d-block w-50">
                              </div>
                              <div class="carousel-item">
                                <img src="{{ asset($ViewData->gambar) }}"  width="100px" class="d-block w-50">
                              </div>
                            </div>
                        </div>
                        <br>
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                              <a class="nav-link active" id="satu" data-toggle="tab" href="#home">Spesifikasi</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#menu1">Harga</a>
                            </li>
                            
                          </ul>
                          <div class="tab-content mb-5 pb-lg-5">
                            <div id="home" class="container tab-pane active"><br>
                              <h5>{{ $ViewData->merek_laptop }}</h5><br>
                              <h5>{{ $ViewData->tipe }}</h5><br>
                              <h5>{{ $ViewData->ram }}</h5><br>
                              <h5>{{ $ViewData->processor }}</h5><br>
                              <h5>{{ $ViewData->display }}</h5><br>
                              <h5>{{ $ViewData->vga_card }}</h5><br>
                              <h5>{{ $ViewData->storage }}</h5><br>
                            </div>
                            <div id="menu1" class="container tab-pane fade"><br>
                                <h5>{{ $ViewData->merek_laptop }}</h5><br>
                                <h5>{{ $ViewData->harga }}</h5><br>
                            </div>
                          </div>
                        </div>
                        
                    </div>
                    
                </div>
                <!-- /.container-fluid -->
                
            </div>
            <!-- End of Main Content -->
            
            <!-- Footer -->
            @include('Web.LayoutPage.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    
   

    <!-- JAVASCRIPT -->
    
   
@endsection

@section('script')
<script>
        
        $(document).ready(function () {
            $('#dtHorizontalVerticalExample').DataTable({
            "scrollX": true,
            "scrollY": 200,
            });
            $('.dataTables_length').addClass('bs-select');
            });

</script>
@endsection
