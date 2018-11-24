<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Akun;
use App\Pengelompokan;
use App\Periode;
use App\Rasio;
use App\JenisRasio;
use App\MasterDiagram;
use App\AkunHasPengelompokan;

class PengaturanAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $akuns = Akun::all();
        $pengelompokans = Pengelompokan::all();
        return view('ringkasan.akun', compact('akuns', 'pengelompokans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $akunhaskelompok['id_akun'] = implode(",", $request->id_akun);
        $dataset = [];
        foreach ($request->id_akun as $akun)
        {
            $dataset[] = [
            'id_akun' => $akun,
            'id_kelompok' => $request->id_kelompok,
            ];
            
        }
        // dd($dataset);
        AkunHasPengelompokan::insert($dataset);
        return redirect('/pengaturan-akun');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
