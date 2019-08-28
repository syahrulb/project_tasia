<?php

namespace App\Http\Controllers;

use PDF;
use App\JenisRasio;
use App\Rasio;
use App\Periode;
use App\Akun;
use App\external\clsrasio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    function index()
    {
        return view('laporan.index');
    }
    public function generateCharttopdf(Request $request)
    {
      $datas = $request->all();
      $rasio = new clsrasio($datas['tipe']);
      $jenis_rasio = JenisRasio::find($datas['tipe']);
      $datas = $rasio->responseTipe();
  		// $pdf = PDF::loadView('laporan.pdf', compact('datas','kriteria','jenis_rasio'));
  		// $pdf->setPaper('A4', 'landscape');
  		// return $pdf->download('laporan-nota-beli.pdf');
      return view('laporan.pdf',compact('datas','kriteria','jenis_rasio'));
    }
    function tutupbuku()
    {
        $periode=DB::table("periodes")->where("aktif","=","1")->first();

        echo "<br/>";
        print_r($periode);
        echo "<br/>";

        $jurnal=DB::table("jurnals")->
                    join("jurnals_has_akuns","jurnals_has_akuns.jurnal_id","=","jurnals.id")->
                    join('akuns', 'akuns.id_akun', '=', 'jurnals_has_akuns.akuns_id')->
                    select('jurnals_has_akuns.*', 'akuns.nama_akun',"akuns.saldo_akun")->
                    where("id_periode","=",$periode->id_periode)->get();


        $tanggalAwalBaru=date("Y-m-d",strtotime($periode->tanggal_akhir." + 1 day"));
        $tanggalAkhirBaru=date("Y-m-d",strtotime($tanggalAwalBaru." + 30 day"));
        echo $tanggalAwalBaru.",". $tanggalAkhirBaru."<br/>";

        $idBaru=DB::table('periodes')->insertGetId(
            [
             'tanggal_awal' => $tanggalAwalBaru,
             'tanggal_akhir' => $tanggalAkhirBaru,
             'created_at'=>date("Y-m-d h:i:s"),
             'updated_at'=>date("Y-m-d h:i:s"),
             'aktif'=>1
            ]
        );
        echo "ID Baru : ".$idBaru."<br/>";

        $saldoA=array();
        for ($i=0;$i<count($jurnal);$i++)
        {
            $dtl=$jurnal[$i];
            print_r($dtl);
            echo "<br/>";
            /*
            $perideha=DB::table("periode_has_akuns")
                     ->where("id_periode","=",$periode->id_periode)
                     ->where("id_akun","=",$dtl->akuns_id)
                     ->first();

            print_r($perideha);
            */
            $nt=($dtl->debet-$dtl->kredit)*$dtl->saldo_akun;
            if (!isset($saldoA[$dtl->akuns_id]))
            {
                $saldoA[$dtl->akuns_id]=$nt;
            }
            else {
                $saldoA[$dtl->akuns_id]+=$nt;
            }
            /*
            $saldo=$perideha->saldo_akhir+$nt;
            echo $nt.",". $saldo."<br/>";
            echo "<br/><br/>";

            DB::table('periode_has_akuns')
                ->where('id', $perideha->id)
                ->update(['saldo_akhir' => $saldo]);
            */
            /*
            DB::table("periode_has_akuns")
                ->
            */
        }


        foreach($saldoA as $key => $value)
        {
            echo $key.":".$saldoA[$key];
            echo "<br/>";
            $perideha=DB::table("periode_has_akuns")
                     ->where("id_periode","=",$periode->id_periode)
                     ->where("id_akun","=",$key)
                     ->first();

            $saldoAwal=$perideha->saldo_awal;
            $saldoAkhir=$saldoAwal+$saldoA[$key];
            echo "Saldo awal ".$saldoAwal.":". $saldoAkhir."<br/>";

            DB::table('periode_has_akuns')
                ->where('id', $perideha->id)
                ->update(['saldo_akhir' => $saldoAkhir]);
        }

        $perideha2=DB::table("periode_has_akuns")
                     ->where("id_periode","=",$periode->id_periode)
                     ->get();

        for ($i=0;$i<count($perideha2);$i++)
        {
            $in=$perideha2[$i];
            DB::table("periode_has_akuns")->insertGetId(
                [
                 'id_periode' => $idBaru,
                 'id_akun' => $in->id_akun,
                 'saldo_awal'=>$in->saldo_akhir,
                 'saldo_akhir'=>0,
                 'created_at'=>date("Y-m-d h:i:s"),
                 'updated_at'=>date("Y-m-d h:i:s")
                ]
            );

        }
        DB::table("periodes")->where("id_periode","=",$periode->id_periode)
                            ->update([
                                        "aktif"=>""
                                        ]);
        //print_r($saldoA);
    }
    function jurnal()
    {
        //$jenis_rasios = JenisRasio::all();
        //$rasios = Rasio::all();
        $data=array();
        $jurnal=DB::table('jurnals')->get();

        for ($i=0;$i<count($jurnal);$i++)
        {
            $detail=DB::table('jurnals_has_akuns')
                     ->join('akuns', 'akuns.id_akun', '=', 'jurnals_has_akuns.akuns_id')
                    ->where("jurnal_id","=",$jurnal[$i]->id)
                    ->select('jurnals_has_akuns.*', 'akuns.nama_akun')
                    ->get();
            $jurnal[$i]->detail=$detail;
        }


        $data["jurnal"]=$jurnal;
        return view('laporan.jurnal', $data);
    }
    function detailjurnal($id)
    {
         $data=array();

        $akun=Akun::all();
        //print_r($periode);
        $data["akun"]=$akun;
        $data["id"]=$id;
        return view('laporan.tambahdetailjurnal', $data);
    }
    function simpanjurnal(Request $request)
    {
        $tanggal=$request->tanggal;
        $nobukti=$request->nomor_bukti;
        $keterangan=$request->keterangan;
        $jenis=$request->jenis;
        $periode=$request->periode;
        DB::table('jurnals')->insert(
            [
             'tanggal_jurnal' => $tanggal,
             'no_bukti' => $nobukti,
             'keterangan' => $keterangan,
             'jenis'=>$jenis,
             'id_periode'=>$periode,
             'created_at'=>date("Y-m-d h:i:s"),
             'updated_at'=>date("Y-m-d h:i:s")
            ]
        );
        return redirect('jurnal');
        //redirect();
        //echo $tanggal.",".$nobukti;
    }
    function simpandetailjurnal(Request $request)
    {
        $id=$request->id;
        $jenis=$request->jenis;
        $akun=$request->akun;
        $jumlah=$request->jumlah;
        $periode=$request->periode;

        $debet=0;
        $kredit=0;
        if ($jenis=="Debet")
        {
            $debet=$jumlah;
        }
        else {
            $kredit=$jumlah;
        }


        DB::table('jurnals_has_akuns')->insert(
            [
             'jurnal_id' => $id,
             'akuns_id' => $akun,
             'debet' => $debet,
             'kredit'=>$kredit
            ]
        );
        return redirect('jurnal');
        //redirect();
        //echo $tanggal.",".$nobukti;
    }
    function tambahjurnal()
    {
        //$jenis_rasios = JenisRasio::all();
        //$rasios = Rasio::all();
        $data=array();

        $periode=Periode::all();
        //print_r($periode);
        $data["periode"]=$periode;
        return view('laporan.tambahjurnal', $data);
    }

    function generatechart()
    {
        $jenis_rasios = JenisRasio::all();
        $rasios = Rasio::all();

        return view('laporan.chart', compact('jenis_rasios', 'rasios'));
    }

    // function generateChartRasio2(Request $request)
    // {

    //     /*
    //     $tanggal = explode("-", $request->get('tanggal'));
    //     $tanggal_awal = date("Y-m-d", strtotime($tanggal[0]));
    //     $tanggal_akhir = date("Y-m-d", strtotime($tanggal[1]));*/
    //     // $ratio=$request->get("rasio");
    //     // $periode=$request->get("periode");
    //     // echo $ratio.",".$periode."<br/>";

    //     //$atas="";
    //     //$bawah="";

    //     $atas=DB::table("rasio_has_pengelompokans")
    //         ->where("id_rasio","=",$ratio)
    //         ->where("posisi",'=',"1")
    //         ->first();

    //     $bawah=DB::table("rasio_has_pengelompokans")
    //         ->where("id_rasio","=",$ratio)
    //         ->where("posisi",'=',"2")
    //         ->first();

    //     // echo "<br/>";
    //     // print_r($atas);
    //     // echo "<br/>";
    //     // print_r($bawah);
    //     // echo "<br/><br/>";

    //     $atasN=DB::table("periode_has_akuns")
    //         ->join("akun_has_pengelompokans","periode_has_akuns.id_akun","akun_has_pengelompokans.id_akun")
    //         ->where("id_periode","=",$periode)
    //         ->where("akun_has_pengelompokans.id_kelompok","=",$atas->id_kelompok)
    //         ->get();

    //     // echo "<br/>Atas<br/>";
    //     // print_r($atasN);
    //     $jumlah=0;
    //     for ($i=0;$i<count($atasN);$i++)
    //     {
    //         $jumlah+=$atasN[$i]->saldo_akhir;
    //     }
    //     // echo "<br/>".$jumlah."<br/><br/>";

    //     $bawahN=DB::table("periode_has_akuns")
    //         ->join("akun_has_pengelompokans","periode_has_akuns.id_akun","akun_has_pengelompokans.id_akun")
    //         ->where("id_periode","=",$periode)
    //         ->where("akun_has_pengelompokans.id_kelompok","=",$bawah->id_kelompok)
    //         ->get();

    //     // echo "<br/>Bawah<br/>";
    //     // print_r($bawahN);
    //      $jumlahA=0;
    //     for ($i=0;$i<count($bawahN);$i++)
    //     {
    //         $jumlahA+=$bawahN[$i]->saldo_akhir;
    //     }
    //     // echo "<br/>".$jumlahA."<br/><br/>";


    //     $hasil=$jumlah/$jumlahA;
    //     // echo "hasil ".$hasil;
    //     /*
    //     $atas=DB::table("periode_has_akuns")
    //         ->where("id_periode","=",$periode)
    //         ->where("id_akun",'LIKE',$atas."%")
    //         ->select("SUM(periode_has_akuns.saldo_akhir) as saldo_akhir")
    //         ->get();

    //     echo "<br/>";
    //     print_r($atas);
    //     */
    // }

    function generateChartRasio(Request $request)
    {
        $tanggal = explode("-", $request->get('tanggal'));
        $tanggal_awal = date("Y-m-d", strtotime($tanggal[0]));
        $tanggal_akhir = date("Y-m-d", strtotime($tanggal[1]));
        $pembanding = Rasio::select(DB::raw("periodes.id_periode, rasios.id_rasio, pengelompokans.id_kelompok,akuns.saldo_akun, periodes.tanggal_awal, periodes.tanggal_akhir, rasios.nama_rasio ,pengelompokans.kegunaan_akun ,SUM(periode_has_akuns.saldo_akhir * akuns.saldo_akun) as total_saldo_akhir"))
            ->join('rasio_has_pengelompokans', 'rasios.id_rasio', '=', 'rasio_has_pengelompokans.id_rasio')
            ->join('pengelompokans', 'rasio_has_pengelompokans.id_kelompok', '=', 'pengelompokans.id_kelompok')
            ->join('akun_has_pengelompokans', 'rasio_has_pengelompokans.id_kelompok', '=', 'akun_has_pengelompokans.id_kelompok')
            ->join('akuns', 'akun_has_pengelompokans.id_akun', '=', 'akuns.id_akun')
            ->join('periode_has_akuns', 'periode_has_akuns.id_akun', '=', 'akun_has_pengelompokans.id_akun')
            ->join('periodes', 'periode_has_akuns.id_periode', '=', 'periodes.id_periode')
            ->whereDate('periodes.tanggal_awal', '>=', $tanggal_awal)
            ->whereDate('periodes.tanggal_akhir', '<=', $tanggal_akhir)
            ->whereIn('rasios.id_rasio', $request->get('rasio'))
            ->groupBy(DB::raw("pengelompokans.id_kelompok, rasios.id_rasio, periodes.id_periode"))
            ->get();
        $arrPembanding = $pembanding->toArray();
        /*
        echo "Pembading<br/>";
        print_r($arrPembanding);
        echo "<br/>";
        */
        $kriteria = Rasio::select(DB::raw("rasios.id_rasio, rasio_has_kriteria.operator, rasio_has_kriteria.nilai_batas, rasio_has_kriteria.kriteria"))
            ->join('rasio_has_kriteria', 'rasios.id_rasio', '=', 'rasio_has_kriteria.id_rasio')
            ->whereIn('rasios.id_rasio', $request->get('rasio'))
            ->get();
        $arrKriteria = $kriteria->toArray();


        $arrRasio = array();
        $arrLabels = array();


        foreach ($arrPembanding as $key => $val) {
            $tanggal_awal = str_replace('-', '/', $val['tanggal_awal']);
            $tanggal_akhir = str_replace('-', '/', $val['tanggal_akhir']);
            $arrRasio[$val['id_rasio']][$val['id_periode']]['tanggal'] = date("d F Y", strtotime($tanggal_awal)) . ' - ' . date("d F Y", strtotime($tanggal_akhir));
            $arrRasio[$val['id_rasio']][$val['id_periode']]['tanggal_awal'] = $val['tanggal_awal'];
            $arrRasio[$val['id_rasio']][$val['id_periode']]['tanggal_akhir'] = $val['tanggal_akhir'];
            $arrRasio[$val['id_rasio']][$val['id_periode']]['nama_rasio'] = $val['nama_rasio'];
            $arrRasio[$val['id_rasio']][$val['id_periode']]['total_saldo_akhir'][] = $val['total_saldo_akhir'];
        }
        $arrKriteriaNew = array();
        foreach ($arrKriteria as $key => $val) {
            $arrKriteriaNew[$val['id_rasio']][] = $val;
        }
        // dd($arrKriteriaNew);

        $error = false;
        $arrKetError = array();
        $index = 0;


        foreach ($arrRasio as $rasio => $periode) {
            foreach ($periode as $key => $value) {
                //print_r($value);
                //echo "<br/><br/>";
                if (sizeof($value['total_saldo_akhir']) < 2) {
                    $error = true;
                    $arrKetError['id_periode'] = $key;
                    $arrKetError['periode'] = $value['tanggal'];
                    $arrKetError['rasio'] = $value['nama_rasio'];

                    break;
                }
                else {
                    //awal
                     $arrLabels[$key] = $value['tanggal'];


                        $ratio=$rasio;
                        $atas=DB::table("rasio_has_pengelompokans")
                            ->where("id_rasio","=",$ratio)
                            ->where("posisi",'=',"1")
                            ->first();

                        $bawah=DB::table("rasio_has_pengelompokans")
                            ->where("id_rasio","=",$ratio)
                            ->where("posisi",'=',"2")
                            ->first();

                        $tengah = DB::table("rasio_has_pengelompokans")
                            ->where("id_rasio","=",$ratio)
                            ->where("posisi",'=',"3")
                            ->first();

                        $atasN=DB::table("periode_has_akuns")
                            ->join("akun_has_pengelompokans","periode_has_akuns.id_akun","akun_has_pengelompokans.id_akun")
                            ->where("id_periode","=",$key)
                            ->where("akun_has_pengelompokans.id_kelompok","=",$atas->id_kelompok)
                            ->get();

                        $jumlah=0;
                        for ($i=0;$i<count($atasN);$i++)
                        {
                            $jumlah+=$atasN[$i]->saldo_akhir;
                        }

                        $bawahN=DB::table("periode_has_akuns")
                            ->join("akun_has_pengelompokans","periode_has_akuns.id_akun","akun_has_pengelompokans.id_akun")
                            ->where("id_periode","=",$key)
                            ->where("akun_has_pengelompokans.id_kelompok","=",$bawah->id_kelompok)
                            ->get();

                         $jumlahA=0;

                        for ($i=0;$i<count($bawahN);$i++)
                        {
                            $jumlahA+=$bawahN[$i]->saldo_akhir;
                        }
                        // $operasi=10;

                        if ($rasio!=10)
                        {
                            $hasil= ($jumlah||$jumlahA)==0?0:$jumlah/$jumlahA;
                        }
                       else
                       {
                        $tengahN=DB::table("periode_has_akuns")
                            ->join("akun_has_pengelompokans","periode_has_akuns.id_akun","akun_has_pengelompokans.id_akun")
                            ->where("id_periode","=",$key)
                            ->where("akun_has_pengelompokans.id_kelompok","=",$tengah->id_kelompok)
                            ->get();

                        $jumlahO=0;
                        for ($i=0;$i<count($atasN);$i++)
                        {
                            $jumlah+=$tengahN[$i]->saldo_akhir;
                        }
                        $hasil=($jumlah+$jumlahO)/$jumlahA;
                        // echo $hasil;
                        }
                        $arrRasio[$rasio][$key]['rasio']=$hasil;
                        foreach ($arrKriteriaNew[$rasio] as $k => $v) {
                                if (version_compare($arrRasio[$rasio][$key]['rasio'], $v['nilai_batas'], $v['operator'])) {
                                    $arrRasio[$rasio][$key]['kriteria'] = $v['kriteria'];
                                    break;
                                }
                        }

                    //akhir
                }

                //akhir
                /*
                if (sizeof($value['total_saldo_akhir']) < 2) {
                    $error = true;
                    $arrKetError['id_periode'] = $key;
                    $arrKetError['periode'] = $value['tanggal'];
                    $arrKetError['rasio'] = $value['nama_rasio'];

                    break;
                } else {
                    $arrRasio[$rasio][$key]['rasio'] = $value['total_saldo_akhir'][0] / $value['total_saldo_akhir'][1];
                    foreach ($arrKriteriaNew[$rasio] as $k => $v) {
                        if (version_compare($arrRasio[$rasio][$key]['rasio'], $v['nilai_batas'], $v['operator'])) {
                            $arrRasio[$rasio][$key]['kriteria'] = $v['kriteria'];
                            break;
                        }
                    }
                }*/

                $index++;
            }

        }


        if ($error) {
            $arrChart['error'] = $error;
            $arrChart['ketError'] = $arrKetError;
        } else {
            //sort array from key 0
            $index = 0;
            $arrNew = array();
            foreach ($arrLabels as $key => $value) {
                $arrNew[$index] = $value;
                $index++;
            }

            // dd($arrRasio);

            $arrChart['data'] = $arrRasio;
            $arrChart['labels'] = $arrNew;
            $arrChart['error'] = $error;

            /*
            foreach ($arrRasio as $key => $value)
            {
                echo $key;
                echo "<br/>";
                print_r($value);
                echo "<br/><br/>";
            }*/
            //print_r($arrRasio);
        }
        echo json_encode($arrChart);
    }

}
