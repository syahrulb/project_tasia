<?php

namespace App\Http\Controllers;

use App\JenisRasio;
use App\Pengelompokan;
use App\Periode;
use App\Rasio;
use App\RasioHasKriteria;
use App\RasioHasPengelompokan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;

class PengaturanRasioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $rasios = Rasio::select('rasios.*', 'jenis_rasios.jenis_rasio')
            ->join('jenis_rasios', 'jenis_rasios.id_jenis_rasio', '=', 'rasios.jenis_rasio')
            ->get();
        return view('ringkasan.index_rasio', compact('rasios'));
    }

    public function pengaturan()
    {
        $periode = Periode::all();
        $rasio1 = Rasio::where('jenis_rasio', 1)->get();
        $rasio2 = Rasio::where('jenis_rasio', 2)->get();
        // dd($rasio1  );
        return view('ringkasan.rasio', compact('periode', 'rasio1', 'rasio2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $pengelompokans = Pengelompokan::all();
        $jenis_rasios = JenisRasio::all();
        return view('ringkasan.create_rasio', compact('pengelompokans', 'jenis_rasios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    public function storerasio(Request $request)
    {
        if ($request->id_kelompok[0] == $request->id_kelompok[1]) {
            return redirect('/create')->with('failed', 'Antar Kelompok Pembanding Rasio Tidak Boleh Sama');
        } else {

            $kelompok = array();
            $kriteria = array();

            $rasio = $request->toArray();
            $arrKriteria = $request->toArray();

            unset($rasio['id_kelompok']);
            unset($rasio['_token']);
            unset($rasio['kriteria_rasio']);

            $save_rasio = Rasio::insertGetId($rasio);
            if ($save_rasio) {
                foreach ($request->id_kelompok as $key => $value) {
                    $kelompok[$key]['id_kelompok'] = $value;
                    $kelompok[$key]['id_rasio'] = $save_rasio;
                }
                $kelompok = RasioHasPengelompokan::insert($kelompok);
                if (!$kelompok) {
                    return redirect('/pengaturan-rasio/')->with('failed', 'Rasio Gagal Ditambahkan');

                } else {

                    if (isset($arrKriteria['kriteria_rasio'])) {
                        foreach ($arrKriteria['kriteria_rasio'] as $key => $value) {
                            $kriteria[$key]['id_rasio'] = $save_rasio;
                            foreach ($value as $x => $y) {
                                $kriteria[$key][$x] = $y;
                            }
                        }
                    }

                    if (sizeof($kriteria) != 0) {
                        $save_kriteria = RasioHasKriteria::insert($kriteria);
                        if ($save_kriteria) {
                            return redirect('/pengaturan-rasio/')->with('success', 'Rasio Berhasil Ditambahkan');
                        } else {
                            return redirect('/pengaturan-rasio/')->with('failed', 'Rasio Gagal Ditambahkan');

                        }
                    }
                }

            } else {
                App::abort(500, 'Error');
            }
        }
        /*
                dd($request->toArray());*/

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $kelompok_rasio = Rasio::select('rasio_has_pengelompokans.id_kelompok', 'rasio_has_pengelompokans.id')
            ->join('rasio_has_pengelompokans', 'rasio_has_pengelompokans.id_rasio', '=', 'rasios.id_rasio')
            ->join('pengelompokans', 'pengelompokans.id_kelompok', '=', 'rasio_has_pengelompokans.id_kelompok')
            ->where('rasios.id_rasio', $id)
            ->get();
        $kriteria_rasio = Rasio::select('rasio_has_kriteria.*')
            ->join('rasio_has_kriteria', 'rasio_has_kriteria.id_rasio', '=', 'rasios.id_rasio')
            ->where('rasios.id_rasio', $id)
            ->get();
        $rasio = Rasio::find($id);
        $pengelompokans = Pengelompokan::all();
        $jenis_rasios = JenisRasio::all();

        return view('ringkasan.edit_rasio', compact('rasio', 'pengelompokans', 'jenis_rasios', 'kelompok_rasio', 'kriteria_rasio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $kelompok = array();
        $success = array();
        $kriteria_new = array();
        $kriteria_old = array();
        $rasio = $request->toArray();
        $arrKriteria = $request->toArray();

        unset($rasio['kelompok_rasio']);
        unset($rasio['kriteria_rasio']);
        unset($rasio['_token']);
        unset($rasio['_method']);

        $save_rasio = Rasio::where('id_rasio', $id)->update($rasio);
        if ($save_rasio) {

            if (isset($arrKriteria['kriteria_rasio'])) {
                foreach ($arrKriteria['kriteria_rasio'] as $key => $value) {
                    if ($value['id'] != null) {
                        $kriteria_old[$key]['id_rasio'] = $id;
                        foreach ($value as $x => $y) {
                            $kriteria_old[$key][$x] = $y;
                        }
                    } else {
                        $kriteria_new[$key]['id_rasio'] = $id;
                        foreach ($value as $x => $y) {
                            $kriteria_new[$key][$x] = $y;
                        }
                    }

                }
            }


            if (sizeof($kriteria_new) != 0) {
                $save_kriteria_new = RasioHasKriteria::insert($kriteria_new);
                if ($save_kriteria_new) {
                    array_push($success, 'success');
                } else {
                    array_push($success, 'failed');
                }
            }


            if (sizeof($kriteria_old) != 0) {
                foreach ($kriteria_old as $key => $value) {
                    $kriteria_old['id_rasio'] = $id;
                    $save_kriteria_old = RasioHasKriteria::where('id', $value['id'])->update($kriteria_old[$key]);
                    if ($save_kriteria_old) {
                        array_push($success, 'success');
                    } else {
                        array_push($success, 'failed');
                    }
                }
            }

            if (in_array('failed', $success)) {
                return redirect('/pengaturan-rasio/')->with('failed', 'Rasio Gagal Ditambahkan');
            } else {
                return redirect('/pengaturan-rasio/')->with('success', 'Rasio Berhasil Ditambahkan');
            }
        } else {
            return redirect('/pengaturan-rasio/')->with('failed', 'Rasio Gagal Ditambahkan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $rasio = Rasio::find($id);
        $del_rasio = $rasio->delete();
        if ($del_rasio) {
            return redirect('/pengaturan-rasio/')->with('success', 'Rasio has been deleted Successfully');
        } else {
            return redirect('/pengaturan-rasio/')->with('failed', 'Rasio Gagal Dihapus');
        }

    }

    public function deleteKriteria(Request $request)
    {
        $rasio = RasioHasKriteria::find($request->id);

        if ($rasio->delete()) {
            $response['status'] = 'success';
        } else {
            $response['status'] = 'failed';
        }
        return response()->json($response);
    }
}
