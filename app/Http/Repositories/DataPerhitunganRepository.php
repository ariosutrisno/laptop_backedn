<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Carbon\Carbon;

class DataPerhitunganRepository
{
    function datautility()
    {   
        $data_alternatif = new DataPerhitunganRepository;
        $data_alternatif = DB::table('data_alternatif')->orderBy('alternatif','asc')->get();
        $data_alternatif->collect_max_c1 =  $data_alternatif->max('c1');
        $data_alternatif->collect_min_c1 = $data_alternatif->min('c1');
        $data_alternatif->collect_max_c2 =  $data_alternatif->max('c2');
        $data_alternatif->collect_min_c2 = $data_alternatif->min('c2');
        $data_alternatif->collect_max_c3 =  $data_alternatif->max('c3');
        $data_alternatif->collect_min_c3 = $data_alternatif->min('c3');
        $data_alternatif->collect_max_c4 =  $data_alternatif->max('c4');
        $data_alternatif->collect_min_c4 = $data_alternatif->min('c4');
        $data_alternatif->collect_max_c5 =  $data_alternatif->max('c5');
        $data_alternatif->collect_min_c5 = $data_alternatif->min('c5');
        $data_alternatif->collect_max_c6 =  $data_alternatif->max('c6');
        $data_alternatif->collect_min_c6 = $data_alternatif->min('c6');
        
        return $data_alternatif;
    }
    /* 
    *
    * PERHITUNGAN DATA NORMALISASI BOBOT
    *
     */
    function data_normalisasi(){
        $data_total_kriteria = new DataPerhitunganRepository();
        $data_total_kriteria->data  = DB::table('data_kriteria')->select('bobot')->get();
        $data_total_kriteria->bobot = $bobot_jumlah =  DB::table('data_kriteria')->sum('bobot');
        return $data_total_kriteria;
    }
    /* 
    *
    * PERHITUNGAN AKHIR
    *
     */
    function hasilperhitungan()
    {
        $perhitungan = new DataPerhitunganRepository;
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
            
            $perhitungan->rank = $data_rank =  ($hitungkali1 + $hitungkali2 + $hitungkali3 + $hitungkali4 + $hitungkali5 + $hitungkali6 );
            $ddd1 = ($hitungkali1 + $hitungkali2 + $hitungkali3 + $hitungkali4 + $hitungkali5 + $hitungkali6 );
            $rr = array($ddd1);
            rsort($rr);
            // // $cc= implode(" ", $ddd);
            //     foreach ($rr as $key => $val) {
            //         echo "$key = $val";
            //         echo '<br>';
            //     }
            
        }
        
        
       
        
        return $perhitungan;
    }
    /* 
    *
    *RANKING
    *
    */
    function ranking_web(){
        $data_ranking = DB::table('data_ranking')->join('data_alternatif','data_alternatif.idx_alternatif','=','data_ranking.alternatif')
        ->join('data_laptop','data_laptop.idx_datalaptop','=','data_ranking.data_laptop')
        ->select('data_alternatif.*','data_laptop.*','data_ranking.*')
        ->orderBy('hasil_akhir','desc')
        ->get();
        return $data_ranking;
    }
    function rangking($request)
    {
        
        $filter = $request->filter;
        $data_ranking = DB::table('data_ranking')->join('data_alternatif','data_alternatif.idx_alternatif','=','data_ranking.alternatif')
        ->join('data_laptop','data_laptop.idx_datalaptop','=','data_ranking.data_laptop')
        ->select('data_alternatif.*','data_laptop.*','data_ranking.*')
        ->where('merek_laptop','like',"%".$filter."%")
        ->orWhere('ram', 'LIKE', '%' . $filter . '%')
        ->orWhere('processor', 'LIKE', '%' . $filter . '%')
        ->orWhere('harga', 'LIKE', '%' . $filter . '%')
        ->distinct()
        ->orderBy('hasil_akhir','desc')
        ->get();
        return $data_ranking;
    }
    function posthitung($request)
    {
        // DB::table('data_ranking')->truncate();
        $data_req = $request->alternatif;
        $data_ranking = $request->ranking;
        DB::table('data_ranking')->insert([
            'alternatif'=>$data_req,
            'hasil_akhir'=>$data_ranking,
        ]);
    }
    function mobile_filter($request)
    {
        
        $data = new DataPerhitunganRepository();
        $data->alternatif = $alternatif= DB::table('data_alternatif')->get();
        $bobot= DB::table('data_kriteria')->get();
        $data->min1 = $alternatif->min('c1');
        $data->max1 = $alternatif->max('c1');
        $data->min2 = $alternatif->min('c2');
        $data->max2 = $alternatif->max('c2');
        $data->min3 = $alternatif->min('c3');
        $data->max3 = $alternatif->max('c3');
        $data->min4 = $alternatif->min('c4');
        $data->max4 = $alternatif->max('c4');
        $data->min5 = $alternatif->min('c5');
        $data->max5 = $alternatif->max('c5');
        $data->min6 = $alternatif->min('c6');
        $data->max6 = $alternatif->max('c6');
        $data->sum = $count = $bobot->sum('bobot');
        $data->bobot1 = round(($bobot[0]->bobot / $count),3);
        $data->bobot2 = round(($bobot[1]->bobot / $count),3);
        $data->bobot3 = round(($bobot[2]->bobot / $count),3);
        $data->bobot4 = round(($bobot[3]->bobot / $count),3);
        $data->bobot5 = round(($bobot[4]->bobot / $count),3);
        $data->bobot6 = round(($bobot[5]->bobot / $count),3);

        $filter = $request->filter;
        $data->filter = DB::table('data_alternatif')
        ->join('data_laptop','data_laptop.idx_datalaptop','=','data_alternatif.data_alter')
        ->select('data_alternatif.*','data_laptop.*')
        ->where('merek_laptop','like',"%".$filter."%")
        ->orWhere('ram', 'LIKE', '%' . $filter . '%')
        ->orWhere('processor', 'LIKE', '%' . $filter . '%')
        ->orWhere('harga', 'LIKE', '%' . $filter . '%')
        ->distinct()
        ->get();

        $data->ram = DB::table('tbl_ram')->get();
        foreach($alternatif as $alter){
            $rank1= ($data->bobot1) * round(($alter->c1 - $data->min1) / ($data->max1 - $data->min1),3);
            $rank2= round(($alter->c2 - $data->min2) / ($data->max2 - $data->min2),3) * ($data->bobot2);
            $rank3= round(($alter->c3 - $data->min3) / ($data->max3 - $data->min3),3) * ($data->bobot3);
            $rank4= round(($alter->c4 - $data->min4) / ($data->max4 - $data->min4),3) * ($data->bobot4);
            $rank5= round(($alter->c5 - $data->min5) / ($data->max5 - $data->min5),3) * ($data->bobot5);
            $rank6= round(($alter->c6 - $data->min6) / ($data->max6 - $data->min6),3) * ($data->bobot6);
            $data->rank[] = (round(($rank1+$rank2+$rank3+$rank4+$rank5+$rank6),3));
        }
        return $data;
    }
}