@extends('Web.LayoutPage.app')
@section('title','DATA HARGA')
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
                <div class="container-fluid"  style="overflow-x:auto;">
                    
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Data Harga</h1>
                    <div class="float-right">
                        <div class="btn-group mb-3" role="group" aria-label="Basic mixed styles example">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
                        </div>
                    </div>
                    
                    <div class="container mt-3">
                        <table class="table table-bordered text-center table-sm" id="dtHorizontalVerticalExample" width="100%">
                            <thead class="table-warning">
                                <tr>
                                    <th>No</th>
                                    <th>Harga</th>
                                    <th >Nilai</th>
                                    <th>Opsi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    @foreach ($data as $item)
                                    <?php $no++ ?>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $item->nama_harga }}</td>
                                        <td>{{ $item->nilai_harga }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="#" class="btn btn-warning btn-edit" data-toggle="modal" data-id="{{ $item->idx_harga }}" data-target="#modaledit">Edit</a>
                                                <a href="{{ url('/harga/ ' . $item->idx_harga . '/delete ') }}" class="btn btn-danger">Delete</a>
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

    
    <!-- INPUT DATA HARGA MODAL -->
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
                    <form method="POST" action="{{ route('dataharga') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nilai</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nilai" name="nilai_hasil" value="{{ old('nilai') }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Keterangan</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Keterangan" name="keterangan" value="{{ old('keterangan') }}">
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
    
     <!-- INPUT DATA HARGA MODAL EDIT -->
     <div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kriteria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form  id="editForm">
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
        url: `/harga/${id}/edit`,
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
    let idx_harga = $('#editForm').find('#idx_harga').val()
    let formData = $('#editForm').serialize()
    $.ajax({
        url: `/harga/${idx_harga}/update`,
        method:"POST",
        data : formData,
        success: function (data) {
        console.log(data)
            // $('#modaledit').find('.modal-body').html(data)
            $('modaledit').hide()
            window.location.assign('/harga')
        },
        error:function (error) {
            console.log(error)
        }
    })
})
</script>
@endsection
