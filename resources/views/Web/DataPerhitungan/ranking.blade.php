@extends('Web.LayoutPage.app')
@section('title','Ranking ')
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
                <div class="container-fluid" >
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Hasil Ranking </h1>
                    <div class="float-right">
                        {{-- <div class="btn-group mb-3" role="group" aria-label="Basic mixed styles example">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Cek Hasil</button>
                        </div> --}}
                    </div>
                    <br>
                    <div class="container mt-4">
                        <table id="example" class="table-success text-center" style="width:100%">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Kode Alternatif</th>
                                    <th>Nama Alternatif</th>
                                    <th>Ranking</th>
                                </tr>
                            </thead>
                            <?php $no = 0; ?>
                            <?php $no++ ?>
                            <tbody>
                                @foreach ($data_ranking as $ranking)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $ranking->alternatif }}</td>
                                    <td>{{ $ranking->datalaptop }}</td>
                                    <td>{{ $ranking->hasil_akhir }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            {{-- @endforeach --}}
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Hitung</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        @csrf
                        {{-- @include('Web.DataPerhitungan.create') --}}
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    
   
@endsection

@section('script')

<script>
        $(document).ready(function() {
            $('#example').DataTable( {
                "pagingType": "full_numbers"
            } );
        } );
</script>
@endsection
