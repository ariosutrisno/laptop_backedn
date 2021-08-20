@extends('Web.LayoutPage.app')
@section('title','Alternatif')
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
                        </div>
                    </div>
                    <div class="container mt-3">

                        <table class="table table-bordered text-center" id="dtHorizontalVerticalExample" width='100%'>
                            <thead class="table-warning">
                                <tr>
                                    <th>Alternatif</th>
                                    <th>Merk Laptop</th>
                                    <th>RAM</th>
                                    <th>PROCESSOR</th>
                                    <th>DISPLAY</th>
                                    <th>STORAGE</th>
                                    <th>VGA CARD</th>
                                    <th>HARGA</th>
                                    <th>OPSI</th>
                                </tr>
                            </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->alternatif }}</td>
                                            <td>{{ $item->merek_laptop }}</td>
                                            <td>{{ $item->ram }}</td>
                                            <td>{{ $item->processor }}</td>
                                            <td>{{ $item->display }}</td>
                                            <td>{{ $item->storage }}</td>
                                            <td>{{ $item->vgacard }}</td>
                                            <td>{{ $item->harga }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a data-toggle="modal" data-id="{{ $item->idx_alternatif }}" data-target="#modaledit" class="btn btn-warning btn-edit">Edit</a>
                                                    <a href="{{ route('deleteDataAlternatif', $item->idx_alternatif) }}" class="btn btn-danger">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                </tbody>
                        </table>
                        <br>
                        <table class="table table-bordered text-center" id="dtHorizontalVerticalExample4">
                            <thead class="table-warning">
                                <tr>
                                    <th>Alternatif</th>
                                    <th>RAM</th>
                                    <th>PROCESSOR</th>
                                    <th>DISPLAY</th>
                                    <th>STORAGE</th>
                                    <th>VGA CARD</th>
                                    <th>HARGA</th>
                                </tr>
                            </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->alternatif }}</td>
                                            <td>{{ $item->nilai_ram }}</td>
                                            <td>{{ $item->nilai_processor }}</td>
                                            <td>{{ $item->nilai_display }}</td>
                                            <td>{{ $item->nilai_storage }}</td>
                                            <td>{{ $item->nilai_vga }}</td>
                                            <td>{{ $item->nilai_harga }}</td>
                                        </tr>
                                        @endforeach
                                </tbody>
                        </table>
                        <br>
                        {{-- min && max nilai utility --}}
                            <table class="table table-bordered text-center" style="border:2px solid black">
                                <thead>
                                    <th colspan="7" class="text-center bg-success" style="color: black">NILAI MIN && MAX</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <th></th>
                                    <th>RAM</th>
                                    <th>PROCESSOR</th>
                                    <th>DISPLAY</th>
                                    <th>STORAGE</th>
                                    <th>VGA CARD</th>
                                    <th>HARGA</th>
                                </tr>
                                <tr style="color: black; background-color:rgba(248, 248, 25, 0.55);border:2px solid black">
                                    <th scope="col">MAX</th>
                                    <th scope="col">{{ $data->max('nilai_ram') }}</th>
                                    <th scope="col">{{ $data->max('nilai_processor') }}</th>
                                    <th scope="col">{{ $data->max('nilai_display') }}</th>
                                    <th scope="col">{{ $data->max('nilai_storage') }}</th>
                                    <th scope="col">{{ $data->max('nilai_vga') }}</th>
                                    <th scope="col">{{ $data->max('nilai_harga') }}</th>
                                </tr>
                                <tr style="color: black;background-color:rgba(237, 125, 9, 0.81);border:2px solid black">
                                    <th scope="col">MIN</th>
                                    <th scope="col">{{ $data->min('nilai_ram') }}</th>
                                    <th scope="col">{{ $data->min('nilai_processor') }}</th>
                                    <th scope="col">{{ $data->min('nilai_display') }}</th>
                                    <th scope="col">{{ $data->min('nilai_storage') }}</th>
                                    <th scope="col">{{ $data->min('nilai_vga') }}</th>
                                    <th scope="col">{{ $data->min('nilai_harga') }}</th>
                                </tr>
                                </tbody>
                            </table>
                        <br>
                        <h1 class="h3 mb-4 text-gray-800">Data Utility</h1>
                        <br>
                        <table class="table table-bordered text-center" id="dtHorizontalVerticalExample1">
                            <thead class="table-warning">
                                <tr>
                                    <th>Alternatif</th>
                                    <th>RAM</th>
                                    <th>PROCESSOR</th>
                                    <th>DISPLAY</th>
                                    <th>STORAGE</th>
                                    <th>VGA CARD</th>
                                    <th>HARGA</th>
                                </tr>
                            </thead>
                                <tbody>
                                    
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->alternatif }}</td>
                                            <td>{{ round((($item->nilai_ram - $data->min('nilai_ram')) / ($data->max('nilai_ram')-$data->min('nilai_ram'))),3) }}</td>
                                            <td>{{ round((($item->nilai_processor - $data->min('nilai_processor')) / ($data->max('nilai_processor')-$data->min('nilai_processor'))),3) }}</td>
                                            <td>{{ round((($item->nilai_display - $data->min('nilai_display')) / ($data->max('nilai_display')-$data->min('nilai_display'))),3) }}</td>
                                            <td>{{ round((($item->nilai_storage - $data->min('nilai_storage')) / ($data->max('nilai_storage')-$data->min('nilai_storage'))),3) }}</td>
                                            <td>{{ round((($item->nilai_vga - $data->min('nilai_vga')) / ($data->max('nilai_vga')-$data->min('nilai_vga'))),3) }}</td>
                                            <td>{{ round((($item->nilai_harga - $data->min('nilai_harga')) / ($data->max('nilai_harga')-$data->min('nilai_harga'))),3) }}</td>
                                            
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

    
    <!-- INPUT DATA ALTERNATIF MODAL -->
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

    <!-- INPUT DATA ALTERNATIF EDIT MODAL -->
    <div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Alternatif</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="edit_alternatif">
                    @csrf
                    <div class="modal-body">

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
        $(document).ready(function () {
            $('#dtHorizontalVerticalExample1').DataTable();
            $('.dataTables_length').addClass('bs-select');
            });
        $(document).ready(function () {
            $('#dtHorizontalVerticalExample4').DataTable();
            $('.dataTables_length').addClass('bs-select');
            });
</script>
<script>
    /* 
    *
    *EDIT DATA ALTERNATIF
    */
    $('.btn-edit').on('click',function () {
    let id = $(this).data('id')
    console.log(id)
    $.ajax({
        url: `/dataAlternatif/${id}/edit`,
        method:"GET",
        success: function (data) {
            $('#modaledit').find('.modal-body').html(data)
            $('#modaledit').modal('show')
        },
        error:function (error) {
            console.log(error)
        }
    })
})
</script>
@endsection
