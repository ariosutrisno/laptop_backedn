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
                    <h1 class="h3 mb-4 text-gray-800">Data Laptop</h1>
                    <div class="float-right">
                        <div class="btn-group mb-3" role="group" aria-label="Basic mixed styles example">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >Tambah Data</button>
                        </div>
                    </div>
                    <table class="table table-bordered text-center" id="dtHorizontalVerticalExample">
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
                                        <td><img src="{{ asset("$item->gambar") }}"  width="100px"></td>
                                        <td>{{ $item->merek_laptop }}</td>
                                        <td>{{ $item->tipe }}</td>
                                        <td>{{ $item->ram }}</td>
                                        <td>{{ $item->processor }}</td>
                                        <td>{{ $item->display }}</td>
                                        <td>{{ $item->storage }}</td>
                                        <td>{{ $item->harga }}</td>
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
            $('#dtHorizontalVerticalExample').DataTable();
        });
</script>
@endsection
