<?php

namespace App\Http\Controllers;

use App\Akun;
use App\Periode;
use App\PeriodeHasAkun;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PeriodeController extends Controller
{
    public function index()
    {
        $periodes = Periode::all();
        return view('periode.index', compact('periodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $akuns = Akun::all();
        return view('periode.create', compact('akuns'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required'
        ]);
        $tanggal = explode("-", $request->get('tanggal'));
        $periode = array();
        $akun_periode = array();
        $periode['tanggal_awal'] = date("Y-m-d", strtotime($tanggal[0]));
        $periode['tanggal_akhir'] = date("Y-m-d", strtotime($tanggal[1]));
        $save_periode = Periode::insertGetId($periode);

        if ($save_periode) {
            foreach ($request->akun_periode as $key => $value) {
                $akun_periode[$key]['id_periode'] = $save_periode;
                foreach ($value as $x => $y) {
                    $akun_periode[$key][$x] = $y;
                }
            }

            if (sizeof($akun_periode) != 0) {
                $save_akun_periode = PeriodeHasAkun::insert($akun_periode);
                if ($save_akun_periode) {
                    return redirect('/periode')->with('success', 'Periode telah ditambahkan');
                } else {
                    return redirect('/periode')->with('failed', 'Periode Gagal Ditambahkan');
                }
            }
        } else {
            return redirect('/periode')->with('failed', 'Periode Gagal Ditambahkan');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $periode = Periode::find($id);

        return view('periode.edit', compact('periode'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $periode = Periode::find($id);
        $akun_periode = PeriodeHasAkun::select('periode_has_akuns.*', 'akuns.nama_akun')
            ->join('akuns', 'periode_has_akuns.id_akun', '=', 'akuns.id_akun')
            ->join('periodes', 'periode_has_akuns.id_periode', '=', 'periodes.id_periode')
            ->where('periodes.id_periode', $id)
            ->get();
        $akuns = Akun::all();
        return view('periode.edit', compact('periode', 'akun_periode', 'akuns'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required'
        ]);
        $tanggal = explode("-", $request->get('tanggal'));
        $periode = array();
        $akun_periode_new = array();
        $akun_periode_old = array();
        $success = array();
        $periode['tanggal_awal'] = date("Y-m-d", strtotime($tanggal[0]));
        $periode['tanggal_akhir'] = date("Y-m-d", strtotime($tanggal[1]));
        $arrAkunPeriode = $request->toArray();


        $save_periode = Periode::where('id_periode', $id)->update($periode);
        if ($save_periode) {
            if (isset($arrAkunPeriode['akun_periode'])) {
                foreach ($arrAkunPeriode['akun_periode'] as $key => $value) {
                    if ($value['id'] != null) {
                        $akun_periode_old[$key]['id_periode'] = $id;
                        foreach ($value as $x => $y) {
                            $akun_periode_old[$key][$x] = $y;
                        }
                    } else {
                        $akun_periode_new[$key]['id_periode'] = $id;
                        foreach ($value as $x => $y) {
                            $akun_periode_new[$key][$x] = $y;
                        }
                    }

                }
            }


            if (sizeof($akun_periode_new) != 0) {
                $save_akun_periode_new = PeriodeHasAkun::insert($akun_periode_new);
                if ($save_akun_periode_new) {
                    array_push($success, 'success');
                } else {
                    array_push($success, 'failed');
                }
            }


            if (sizeof($akun_periode_old) != 0) {
                foreach ($akun_periode_old as $key => $value) {
                    $akun_periode_old['id_akun'] = $id;
                    $save_akun_periode_old = PeriodeHasAkun::where('id', $value['id'])->update($akun_periode_old[$key]);
                    if ($save_akun_periode_old) {
                        array_push($success, 'success');
                    } else {
                        array_push($success, 'failed');
                    }
                }
            }

            if (in_array('failed', $success)) {
                return redirect('/periode')->with('failed', 'Periode Gagal Dirubah');
            } else {
                return redirect('/periode/')->with('success', 'Rasio Berhasil Ditambahkan');
            }

        } else {
            return redirect('/periode')->with('failed', 'Periode Gagal Dirubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $share = Periode::find($id);
        $del_share = $share->delete();

        if ($del_share) {
            return redirect('/periode')->with('success', 'Periode has been deleted Successfully');
        } else {
            return redirect('/periode')->with('failed', 'Periode Gagal Dihapus');
        }

    }

    public function deleteAkunPeriode(Request $request)
    {
        $akun = PeriodeHasAkun::find($request->id);

        if ($akun->delete()) {
            $response['status'] = 'success';
        } else {
            $response['status'] = 'failed';
        }
        return response()->json($response);
    }
}
