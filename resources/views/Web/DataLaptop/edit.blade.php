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
                    <h1 class="h3 mb-4 text-gray-800">Data Laptop edit</h1>
                    <div class="overflow-auto">
                        <form method="POST" action="{{ route('DataViewUpdated', $idx_datalaptop) }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nomor Laptop</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="nomor laptop" name="nomor_laptop" value="{{ $nomor_laptop->nomor_laptop }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Merk Laptop</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Merk Laptop" name="merek" value="{{ old('merek') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Tipe Laptop</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tipe Laptop" name="tipe" value="{{ old('tipe') }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Processor</label> 
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Processor" name="processor" value="{{ old('processor') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">RAM</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="RAM" name="ram" value="{{ old('ram') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Storage</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Storage" name="storage" value="{{ old('storage') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">VGA Card</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="VGA Card" name="vga" value="{{ old('vga') }}">
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Harga Laptop</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Harga Laptop" name="harga" value="{{ old('harga') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Gambar Laptop</label>
                                <div class="custom-file">
                                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="gambar" value="{{ old('gambar') }}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                        
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
