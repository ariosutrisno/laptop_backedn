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
                    <h1 class="h3 mb-4 text-gray-800">Hasil Perhitungan </h1>
                    <div class="float-right">
                        <div class="btn-group mb-3" role="group" aria-label="Basic mixed styles example">
                            <a href="{{ route('getRangking') }}" class="btn btn-success">Ranking</a>
                            <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal">Save Data Rank</button>
                        </div>
                    </div>
                    
                    <div class="container mt-4">
                        <table id="example" class="table-success" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Kode Alternatif</th>
                                    <th>Nama Alternatif</th>
                                    <th>Hasil Perhitungan</th>
                                    
                                </tr>
                            </thead>
                            @php
                            $perhitungan = DB::table('data_alternatif')
                            ->join('tbl_ram','tbl_ram.idx_ram','=','data_alternatif.idx_ram')
                            ->join('tbl_processor','tbl_processor.idx_processor','=','data_alternatif.idx_processor')
                            ->join('tbl_storage','tbl_storage.idx_storage','=','data_alternatif.idx_storage')
                            ->join('tbl_display','tbl_display.idx_display','=','data_alternatif.idx_display')
                            ->join('tbl_vgacard','tbl_vgacard.idx_vga','=','data_alternatif.idx_vga_card')
                            ->join('tbl_harga','tbl_harga.idx_harga','=','data_alternatif.idx_harga')
                            ->join('data_laptop','data_laptop.idx_datalaptop','=','data_alternatif.data_alter')
                            ->select('tbl_ram.*','tbl_storage.*','tbl_display.*','tbl_vgacard.*','tbl_harga.*','tbl_processor.*','data_alternatif.*','data_laptop.*')
                            ->get();
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
                            $dataMax1 = $perhitungan->max('nilai_ram');
                            $dataMin1 = $perhitungan->min('nilai_ram');
                            $dataMax2 = $perhitungan->max('nilai_processor');
                            $dataMin2 = $perhitungan->min('nilai_processor');
                            $dataMax3 = $perhitungan->max('nilai_display');
                            $dataMin3 = $perhitungan->min('nilai_display');
                            $dataMax4 = $perhitungan->max('nilai_storage');
                            $dataMin4 = $perhitungan->min('nilai_storage');
                            $dataMax5 = $perhitungan->max('nilai_vga');
                            $dataMin5 = $perhitungan->min('nilai_vga');
                            $dataMax6 = $perhitungan->max('nilai_harga');
                            $dataMin6 = $perhitungan->min('nilai_harga');
                        @endphp
                            @foreach ($perhitungan as $datas)
                            @php
                                    $datautility1 = (($datas->nilai_ram - $dataMin1) / ($dataMax1 - $dataMin1));
                                    $datautility2 = (($datas->nilai_processor - $dataMin2) / ($dataMax2 - $dataMin2));
                                    $datautility3 = (($datas->nilai_display - $dataMin3) / ($dataMax3 - $dataMin3));
                                    $datautility4 = (($datas->nilai_storage - $dataMin4) / ($dataMax4 - $dataMin4));
                                    $datautility5 = (($datas->nilai_vga - $dataMin5) / ($dataMax5 - $dataMin5));
                                    $datautility6 = (($datas->nilai_harga - $dataMin6) / ($dataMax6 - $dataMin6));

                                    $hitungkali1 = number_format(($hasil_bobot1*$datautility1),4);
                                    $hitungkali2 = number_format(($hasil_bobot2*$datautility2),4);
                                    $hitungkali3 = number_format(($hasil_bobot3*$datautility3),4);
                                    $hitungkali4 = number_format(($hasil_bobot4*$datautility4),4);
                                    $hitungkali5 = number_format(($hasil_bobot5*$datautility5),4);
                                    $hitungkali6 = number_format(($hasil_bobot6*$datautility6),4);
                                    
                                    $perhitungan->rank =  ($hitungkali1 + $hitungkali2 + $hitungkali3 + $hitungkali4 + $hitungkali5 + $hitungkali6 );
                                    
                            @endphp
                            <tbody>
                                <tr>
                                    <td>{{ $datas->alternatif }}</td>
                                    <td>{{ $datas->merek_laptop }}</td>
                                    <td>{{ $perhitungan->rank }}</td>
                                    {{-- <td></td> --}}
                                </tr>
                            </tbody>
                            @endforeach
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
                    <form action="{{ route('posthitung') }}" method="POST">
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
<script>
    $(document).ready(function() {
    $(".total")
        .map(function(){return $(this).text()})
        .get()
        .sort(function(a,b){return a - b })
        .reduce(function(a, b){ if (b != a[0]) a.unshift(b); return a }, [])
        .forEach((v,i)=>{
    $('.total').filter(function() {return $(this).text() == v;}).next().text(i + 1);
    });
});
</script>
@endsection
