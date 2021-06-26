@extends('Web.LayoutPage.app')
@section('title','All Data Kriteria')
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
                    <h1 class="h3 mb-4 text-gray-800">Data Kriteria</h1>
                    <div class="float-right">
                        <div class="btn-group mb-3" role="group" aria-label="Basic mixed styles example">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
                        </div>
                    </div>
                    <div class="float-right mr-2">
                        <div class="btn-group mb-3" role="group" aria-label="Basic mixed styles example">
                            <a href="{{ route('datanormalisasi') }}" class="btn btn-primary" >Hasil Normalisasi</a>
                        </div>
                    </div>
                    <div class="container mt-3">
                        <table class="table table-bordered text-center table-sm" id="dtHorizontalVerticalExample" width="100%">
                            <thead class="table-warning">
                                <tr>
                                    <th>No</th>
                                    <th >Kode Kriteria</th>
                                    <th>Kriteria</th>
                                    <th>Bobot</th>
                                    <th>Deskripsi</th>
                                    <th>Opsi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    @foreach ($data as $item)
                                    <?php $no++ ?>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $item->kriteria_id }}</td>
                                        <td>{{ $item->nama_kriteria }}</td>
                                        <td>{{ $item->bobot }}</td>
                                        <td>{{ $item->deskripsi }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href=""  data-toggle="modal" data-id="{{ $item->idx_kriteria }}" data-target="#modaledit" class="btn btn-warning btn-edit">Edit</a>
                                                <a href="{{ url('/dataKriteria/ ' . $item->idx_kriteria . '/delete ') }}" class="btn btn-danger">Delete</a>
                                            </div>
                                        </td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kriteria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('PostDataKritera') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Kode Kritera</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="No. kriteria " name="kriteria_id" value="{{ old('kriteria_id') }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Kriteria</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="nama kriteria " name="nama_kriteria" value="{{ old('nama_kriteria') }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Deskripsi</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Deskripsi" name="deskripsi" value="{{ old('deskripsi') }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Bobot</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="bobot" name="bobot" value="{{ old('bobot') }}">
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- INPUT DATA LAPTOP MODAL EDIT -->
    <div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kriteria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm" >
                    @csrf
                    <div class="modal-body">
                        
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success btn-update">Save changes</button>
                    </div>
                </form>
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
<script>
    // EDIT

$('.btn-edit').on('click',function () {
    // console.log($(this).data('id'))
    let id = $(this).data('id')
    $.ajax({
        url: `/dataKriteria/${id}/edit`,
        method:"GET",
        success: function (data) {
            // console.log(data)
            $('#modaledit').find('.modal-body').html(data)
            $('#modaledit').modal('show')
        },
        error:function (error) {
            console.log(error)
        }
    })
})

// update
$('.btn-update').on('click',function () {
    // console.log($(this).data('id'))
    let dataKriteria = $('#editForm').find('#idx_kriteria').val()
    let formData = $('#editForm').serialize()
    $.ajax({
        url: `/dataKriteria/${dataKriteria}/update`,
        method:"POST",
        data : formData,
        success: function (data) {
        console.log(data)
            // $('#modaledit').find('.modal-body').html(data)
            $('modaledit').hide()
            window.location.assign('/dataKriteria')
        },
        error:function (error) {
            console.log(error)
        }
    })
})
</script>
@endsection
