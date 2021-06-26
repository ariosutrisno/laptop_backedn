@extends('Web.LayoutPage.app')
@section('title','All Data Laptop')
@section('content')
{{-- {{ dd($dataAll->all()) }} --}}
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
                <div class="container-fluid"  style="overflow-x:auto;">
                    
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Data Laptop</h1>
                    <div class="float-right">
                        <div class="btn-group mb-3" role="group" aria-label="Basic mixed styles example">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >Tambah Data</button>
                          </div>
                    </div>
                    <table class="table table-bordered text-center" id="dtHorizontalVerticalExample" width="100%">
                        <thead class="table-warning">
                            <tr>
                                <th>NO</th>
                                <th>Gambar Laptop</th>
                                <th>Merk Laptop</th>
                                <th>Tipe Laptop</th>
                                <th>RAM</th>
                                <th>processor</th>
                                <th>Display</th>
                                <th>Storage</th>
                                <th>VGA Card</th>
                                <th>Harga</th>
                                <th>Opsi</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach ($dataAll as $item)
                                    <?php $no++ ?>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td><img src="{{ asset($item->gambar) }}"  width="100px"></td>
                                        <td>{{ $item->merek_laptop }}</td>
                                        <td>{{ $item->tipe }}</td>
                                        <td>{{ $item->ram }}</td>
                                        <td>{{ $item->processor }}</td>
                                        <td>{{ $item->display }}</td>
                                        <td>{{ $item->storage }}</td>
                                        <td>{{ $item->harga }}</td>
                                        <td>{{ $item->vga_card }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ url('/datalaptop/' . $item->idx_datalaptop ) }}" class="btn btn-success">View</a>
                                                <a href="{{ url('/datalaptop/' . $item->idx_datalaptop. '/edit ' ) }}" class="btn btn-warning">Edit</a>
                                                <a href="{{ url('/datalaptop/' . $item->idx_datalaptop . '/delete/ ') }}" class="btn btn-danger">Delete</a>
                                            </div>
                                        </td>
                                        </tr>
                                @endforeach
                            </tbody>
                    </table>
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

    
    <!-- INPUT DATA LAPTOP MODAL -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Laptop</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('Web.DataLaptop.create')
            </div>
            </div>
        </div>
        </div>

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
