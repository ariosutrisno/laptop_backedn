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
        $data = new DataPerhitunganRepository;
        $alternatif = DB::table('data_alternatif')
        ->join('tbl_ram','tbl_ram.idx_ram','=','data_alternatif.idx_ram')
        ->join('tbl_processor','tbl_processor.idx_processor','=','data_alternatif.idx_processor')
        ->join('tbl_storage','tbl_storage.idx_storage','=','data_alternatif.idx_storage')
        ->join('tbl_display','tbl_display.idx_display','=','data_alternatif.idx_display')
        ->join('tbl_vgacard','tbl_vgacard.idx_vga','=','data_alternatif.idx_vga_card')
        ->join('tbl_harga','tbl_harga.idx_harga','=','data_alternatif.idx_harga')
        ->join('data_laptop','data_laptop.idx_datalaptop','=','data_alternatif.data_alter')
        ->select('tbl_ram.*','tbl_storage.*','tbl_display.*','tbl_vgacard.*','tbl_harga.*','tbl_processor.*','data_alternatif.*','data_laptop.*')
        ->get();
        $dataMax1 = $alternatif->max('nilai_ram');
        $dataMin1 = $alternatif->min('nilai_ram');
        $dataMax2 = $alternatif->max('nilai_processor');
        $dataMin2 = $alternatif->min('nilai_processor');
        $dataMax3 = $alternatif->max('nilai_display');
        $dataMin3 = $alternatif->min('nilai_display');
        $dataMax4 = $alternatif->max('nilai_storage');
        $dataMin4 = $alternatif->min('nilai_storage');
        $dataMax5 = $alternatif->max('nilai_vga');
        $dataMin5 = $alternatif->min('nilai_vga');
        $dataMax6 = $alternatif->max('nilai_harga');
        $dataMin6 = $alternatif->min('nilai_harga');
        $kriteria = DB::table('data_kriteria')->get();
        $sum = DB::table('data_kriteria')->sum('bobot');
        $kriteria['0']->bobot / $sum;
        $kriteria['1']->bobot / $sum;
        $kriteria['2']->bobot / $sum;
        $kriteria['3']->bobot / $sum;
        $kriteria['4']->bobot / $sum;
        $kriteria['5']->bobot / $sum;
        dd($dataMax3);
        foreach ($alternatif as $alter) {
            # code...
            $datautility1 = (($alter->nilai_ram - $dataMin1) / ($dataMax1 - $dataMin1));
            $datautility2 = (($alter->nilai_processor - $dataMin2) / ($dataMax2 - $dataMin2));
            $datautility3 = (($alter->nilai_display));
            $datautility4 = (($alter->nilai_storage - $dataMin4) / ($dataMax4 - $dataMin4));
            $datautility5 = (($alter->nilai_vga - $dataMin5) / ($dataMax5 - $dataMin5));
            $datautility6 = (($alter->nilai_harga - $dataMin6) / ($dataMax6 - $dataMin6));
        }
        return $data;
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
    /* MOBILE API */
    function allrank()
    {
        $data = new DataPerhitunganRepository();
        $data->alternatif = $alternatif= DB::table('data_alternatif')->join('data_laptop','data_laptop.idx_datalaptop','=','data_alternatif.data_alter')
        ->select('data_alternatif.*','data_laptop.*')
        ->get();
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