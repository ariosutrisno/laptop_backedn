@extends('Web.LayoutPage.app')
@section('title','Nilai Utility')
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
                <div class="container-fluid"  style="overflow-x:auto;">
                    
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Nilai Utility</h1>
                    
        
                    <table class="table table-bordered text-center" id="dtHorizontalVerticalExample" width="100%">
                        <thead class="table-warning">
                            <tr>
                                <th>NO</th>
                                <th>Nama Alternatif</th>
                                <th>c1</th>
                                <th>c2</th>
                                <th>c3</th>
                                <th>c4</th>
                                <th>c5</th>
                                <th>c6</th>
                                <th>Opsi</th>
                            </tr>
                            </thead>
                            <tbody>
                                
                                <?php $no = 0;?>
                                @foreach ($data_tampil as $utility)
                                <?php $no++ ;?>
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $utility->alternatif }}</td>
                                    <td>{{ (($utility->c1 -  $data_tampil->collect_min_c1) / ($data_tampil->collect_max_c1 - $data_tampil->collect_min_c1)) }}</td>
                                    <td>{{ ($utility->c2 -  $data_tampil->collect_min_c2) / ($data_tampil->collect_max_c2 - $data_tampil->collect_min_c2) }}</td>
                                    <td>{{ ($utility->c3 -  $data_tampil->collect_min_c3) / ($data_tampil->collect_max_c3 - $data_tampil->collect_min_c3) }}</td>
                                    <td>{{ ($utility->c4 -  $data_tampil->collect_min_c4) / ($data_tampil->collect_max_c4 - $data_tampil->collect_min_c4) }}</td>
                                    <td>{{ ($utility->c5 -  $data_tampil->collect_min_c5) / ($data_tampil->collect_max_c5 - $data_tampil->collect_min_c5) }}</td>
                                    <td>{{ ($utility->c6 -  $data_tampil->collect_min_c6) / ($data_tampil->collect_max_c6 - $data_tampil->collect_min_c6) }}</td>
                                    {{-- @foreach ($data_normalisasi as $item)
                                    @endforeach --}}
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-danger">Delete</button>
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
