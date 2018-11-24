<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Akun;
use App\Pengelompokan;

class RingkasanController extends Controller
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
        return view('ringkasan.index', compact('akuns', 'pengelompokans'));
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
        $akuns['nama_akun'] = $request->nama_akun;
        $input = $request->all();
        $pengelompokan->kegunaan_akun = $request->input('kegunaan_akun');
        $akuns = new AkunHasPengelompokan;
        Akun::create($akuns);
        Pengelompokan::create($pengelompokan);
        return redirect('/ringkasan/create');
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
