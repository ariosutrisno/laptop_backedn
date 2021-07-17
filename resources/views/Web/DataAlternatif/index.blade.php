@extends('Web.LayoutPage.app')
@section('title','All Data Alternatif')
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

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        @include('Web.LayoutPage.profileHeader')

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Data Alternatif</h1>
                    <div class="float-right">
                        <div class="btn-group mb-3" role="group" aria-label="Basic mixed styles example">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
                            <a href="{{ route('dataUltility') }}" class="btn btn-success" >Tabel Nilai Utility</a>
                        </div>
                    </div>
                    <div class="container mt-3">

                        <table class="table table-bordered text-center" id="dtHorizontalVerticalExample">
                            <thead class="table-warning">
                                <tr>
                                    <th>NO</th>
                                    <th>Alternatif</th>
                                    <th>Merk Laptop</th>
                                    <th>C1</th>
                                    <th>C2</th>
                                    <th>C3</th>
                                    <th>C4</th>
                                    <th>C5</th>
                                    <th>C6</th>
                                </tr>
                            </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <?php $no = 0; ?>
                                        <?php $no++ ?>
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $item->alternatif }}</td>
                                            <td>{{ $item->datalaptop }}</td>
                                            <td>{{ $item->c1 }}</td>
                                            <td>{{ $item->c2 }}</td>
                                            <td>{{ $item->c3 }}</td>
                                            <td>{{ $item->c4 }}</td>
                                            <td>{{ $item->c5 }}</td>
                                            <td>{{ $item->c6 }}</td>
                                        </tr>
                                        @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            
            <!-- Footer -->
            {{-- @include('Web.LayoutPage.footer') --}}
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Alternatif</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('PostDataAlternatif') }}" method="POST">
                        @csrf
                        @include('Web.DataAlternatif.create')
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    
   
@endsection

@section('script')
<script>
        
        $(document).ready(function () {
            $('#dtHorizontalVerticalExample').DataTable();
            $('.dataTables_length').addClass('bs-select');
            });
</script>
@endsection
