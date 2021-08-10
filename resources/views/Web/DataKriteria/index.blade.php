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
                    <h1 class="h3 mb-4 text-gray-800">Data Kriteria</h1>
                    <div class="float-right">
                        {{-- <div class="btn-group mb-3" role="group" aria-label="Basic mixed styles example">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
                        </div> --}}
                    </div>
                    {{-- <div class="float-right mr-2">
                        <div class="btn-group mb-3" role="group" aria-label="Basic mixed styles example">
                            <a href="{{ route('datanormalisasi') }}" class="btn btn-primary" >Hasil Normalisasi</a>
                        </div>
                    </div> --}}
                    <div class="container mt-3">
                        <table class="table table-bordered text-center table-sm" id="dtHorizontalVerticalExample">
                            <thead class="table-warning">
                                <tr>
                                    <th>No</th>
                                    <th>Kode Kriteria</th>
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
                                                {{-- <a href=""  data-toggle="modal" data-id="{{ $item->idx_kriteria }}" data-target="#modaledit" class="btn btn-warning btn-edit">Edit</a> --}}
                                                <a href="{{ url('/dataKriteria/ ' . $item->idx_kriteria . '/delete ') }}" class="btn btn-danger">Delete</a>
                                            </div>
                                        </td>
                                        </tr>
                                        @endforeach
                                </tbody>
                        </table>
                    </div>
                    <br>
                    <div class="container mt-3">
                        <table class="table table-bordered text-center table-sm" id="dtHorizontalVerticalExample">
                            <thead class="table-warning">
                                <tr>
                                    <th>No</th>
                                    <th>Kriteria</th>
                                    <th>Bobot</th>
                                    <th>Hasil Normalisasi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    @foreach ($data as $item)
                                    <?php $no++ ?>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $item->nama_kriteria }}</td>
                                        <td>{{ $item->bobot }}</td>
                                        <td>{{ round(($item->bobot) / $count_kriteria,3) }}</td>
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
            $('#dtHorizontalVerticalExample').DataTable();
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
