<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Akun;
use App\Pengelompokan;
use App\Periode;
use App\Rasio;
use App\JenisRasio;
use App\MasterDiagram;


class RingkasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $periode = Periode::all();
        $rasio1 = Rasio::where('jenis_rasio', 1)->get();
        $rasio2 = Rasio::where('jenis_rasio', 2)->get();
        $jenisRasio = JenisRasio::all();
        $diagram1 = MasterDiagram::all();
        $diagram2 = MasterDiagram::all();
        // dd($rasio1  );
        return view('ringkasan.create', compact('periode', 'rasio1', 'rasio2', 'jenisRasio', 'diagram1', 'diagram2'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 
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
