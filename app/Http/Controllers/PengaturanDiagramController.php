<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterDiagram;
use App\JenisRasio;

class PengaturanDiagramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diagram1 = MasterDiagram::all();
        $diagram2 = MasterDiagram::all();

        return view('ringkasan.diagram', compact('diagram1', 'diagram2'));
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
        // dd($request[1]);
        for ($i = 1; $i <= 2; $i++) {
            $jenisRasio = JenisRasio::where('id_jenis_rasio', $i)->first();

            $jenisRasio->master_diagram = $request[$i];
            $jenisRasio->save();
        }

        return redirect('/pengaturan-diagram');
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
