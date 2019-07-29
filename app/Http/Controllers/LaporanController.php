<?php

namespace App\Http\Controllers;

use App\JenisRasio;
use App\Rasio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    function index()
    {
        return view('laporan.index');
    }

    function generatechart()
    {
        $jenis_rasios = JenisRasio::all();
        $rasios = Rasio::all();

        return view('laporan.chart', compact('jenis_rasios', 'rasios'));
    }

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

        $error = false;
        $arrKetError = array();
        $index = 0;
        foreach ($arrRasio as $rasio => $periode) {
            foreach ($periode as $key => $value) {
                $arrLabels[$key] = $value['tanggal'];
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
                }

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

            $arrChart['data'] = $arrRasio;
            $arrChart['labels'] = $arrNew;
            $arrChart['error'] = $error;
        }

        echo json_encode($arrChart);


    }
}
