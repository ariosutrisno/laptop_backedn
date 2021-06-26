@extends('Web.LayoutPage.app')
@section('title','Hasil Perhitungan ')
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
                    <h1 class="h3 mb-4 text-gray-800">Hasil Perhitungan </h1>
                    <div class="float-right">
                        <div class="btn-group mb-3" role="group" aria-label="Basic mixed styles example">
                            <a href="{{ route('getRangking') }}" class="btn btn-success">Ranking</a>
                            <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal">Save Data Rank</button>
                        </div>
                    </div>
                    
                    <table class="table table-bordered text-center" id="dtHorizontalVerticalExample" width="100%">
                        <thead class="table-warning">
                            <tr>
                                <th>NO</th>
                                <th>Kode Alternatif</th>
                                <th>Nama Alternatif</th>
                                <th>Hasil Perhitungan</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                <?php $no++ ?>
                                <!--PHP NATIVE RANKING -->
                                    @php
                                    $perhitungan = DB::table('data_alternatif')->get();
                                    $data2 = DB::table('data_kriteria')->sum('bobot');
                                    $normalisasi_bobot_1 = DB::table('data_kriteria')->select('bobot')
                                    ->where('idx_kriteria','=',2)
                                    ->value('bobot');
                                    $normalisasi_bobot_2 = DB::table('data_kriteria')->select('bobot')
                                    ->where('idx_kriteria','=',3)
                                    ->value('bobot');
                                    $normalisasi_bobot_3 = DB::table('data_kriteria')->select('bobot')
                                    ->where('idx_kriteria','=',4)
                                    ->value('bobot');
                                    $normalisasi_bobot_4 = DB::table('data_kriteria')->select('bobot')
                                    ->where('idx_kriteria','=',5)
                                    ->value('bobot');
                                    $normalisasi_bobot_5 = DB::table('data_kriteria')->select('bobot')
                                    ->where('idx_kriteria','=',6)
                                    ->value('bobot');
                                    $normalisasi_bobot_6 = DB::table('data_kriteria')->select('bobot')
                                    ->where('idx_kriteria','=',8)
                                    ->value('bobot');
                                    /* 
                                    *NORMALISASI BOBOT
                                    */
                                    $hasil_bobot1 = $normalisasi_bobot_1 / $data2;
                                    $hasil_bobot2 = $normalisasi_bobot_2 / $data2;
                                    $hasil_bobot3 = $normalisasi_bobot_3 / $data2;
                                    $hasil_bobot4 = $normalisasi_bobot_4 / $data2;
                                    $hasil_bobot5 = $normalisasi_bobot_5 / $data2;
                                    $hasil_bobot6 = $normalisasi_bobot_6 / $data2;
                                    $dataMax1 = $perhitungan->max('c1');
                                    $dataMin1 = $perhitungan->min('c1');
                                    $dataMax2 = $perhitungan->max('c2');
                                    $dataMin2 = $perhitungan->min('c2');
                                    $dataMax3 = $perhitungan->max('c3');
                                    $dataMin3 = $perhitungan->min('c3');
                                    $dataMax4 = $perhitungan->max('c4');
                                    $dataMin4 = $perhitungan->min('c4');
                                    $dataMax5 = $perhitungan->max('c5');
                                    $dataMin5 = $perhitungan->min('c5');
                                    $dataMax6 = $perhitungan->max('c6');
                                    $dataMin6 = $perhitungan->min('c6');
                                    foreach ($perhitungan as $datas) {
                                        # code...
                                        $datautility1 = (($datas->c1 - $dataMin1) / ($dataMax1 - $dataMin1));
                                        $datautility2 = (($datas->c2 - $dataMin2) / ($dataMax2 - $dataMin2));
                                        $datautility3 = (($datas->c3 - $dataMin3) / ($dataMax3 - $dataMin3));
                                        $datautility4 = (($datas->c4 - $dataMin4) / ($dataMax4 - $dataMin4));
                                        $datautility5 = (($datas->c5 - $dataMin5) / ($dataMax5 - $dataMin5));
                                        $datautility6 = (($datas->c6 - $dataMin6) / ($dataMax6 - $dataMin6));

                                        $hitungkali1 = number_format(($hasil_bobot1*$datautility1),4);
                                        $hitungkali2 = number_format(($hasil_bobot2*$datautility2),4);
                                        $hitungkali3 = number_format(($hasil_bobot3*$datautility3),4);
                                        $hitungkali4 = number_format(($hasil_bobot4*$datautility4),4);
                                        $hitungkali5 = number_format(($hasil_bobot5*$datautility5),4);
                                        $hitungkali6 = number_format(($hasil_bobot6*$datautility6),4);
                                        
                                        $perhitungan->rank = ($hitungkali1 + $hitungkali2 + $hitungkali3 + $hitungkali4 + $hitungkali5 + $hitungkali6 );
                                        
                                    }
                                @endphp
                                @foreach ($perhitungan as $datas)
                                        @php
                                            $datautility1 = (($datas->c1 - $dataMin1) / ($dataMax1 - $dataMin1));
                                                $datautility2 = (($datas->c2 - $dataMin2) / ($dataMax2 - $dataMin2));
                                                $datautility3 = (($datas->c3 - $dataMin3) / ($dataMax3 - $dataMin3));
                                                $datautility4 = (($datas->c4 - $dataMin4) / ($dataMax4 - $dataMin4));
                                                $datautility5 = (($datas->c5 - $dataMin5) / ($dataMax5 - $dataMin5));
                                                $datautility6 = (($datas->c6 - $dataMin6) / ($dataMax6 - $dataMin6));

                                                $hitungkali1 = number_format(($hasil_bobot1*$datautility1),4);
                                                $hitungkali2 = number_format(($hasil_bobot2*$datautility2),4);
                                                $hitungkali3 = number_format(($hasil_bobot3*$datautility3),4);
                                                $hitungkali4 = number_format(($hasil_bobot4*$datautility4),4);
                                                $hitungkali5 = number_format(($hasil_bobot5*$datautility5),4);
                                                $hitungkali6 = number_format(($hasil_bobot6*$datautility6),4);
                                                
                                                $perhitungan->rank =  ($hitungkali1 + $hitungkali2 + $hitungkali3 + $hitungkali4 + $hitungkali5 + $hitungkali6 );
                                                // $data12 = array(($hitungkali1 + $hitungkali2 + $hitungkali3 + $hitungkali4 + $hitungkali5 + $hitungkali6 ));
                                                // rsort($perhitungan->rank );
                                        @endphp
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $datas->alternatif }}</td>
                                        <td>{{ $datas->datalaptop }}</td>
                                        <td>{{ $perhitungan->rank }}</td>
                                    <tr>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Hitung</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('posthitung') }}" method="POST">
                        @csrf
                        @include('Web.DataPerhitungan.create')
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
            $('#dtHorizontalVerticalExample').DataTable({
            "scrollX": true,
            "scrollY": 200,
            });
            $('.dataTables_length').addClass('bs-select');
            });
            

            


</script>
@endsection
