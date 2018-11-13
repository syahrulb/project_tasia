<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InfoPerusahaan;
use Illuminate\Support\Facades\Auth;

class InfoPerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('setting_awal.setting_perusahaan');
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
        $info_perusahaan = new InfoPerusahaan(
                array(
                    'id_user' => Auth::user()->id,
                    'nama_perusahaan' => $request->get('nama_perusahaan'),
                    'alamat' => $request->get('alamat'),
                    'telefon' => $request->get('telefon'),
                    'bidang_perusahaan' => $request->get('bidang_perusahaan'),
                    'fax' => $request->get('fax'),
                    'alamat' => $request->get('alamat'),
                    'email' => $request->get('email'),
                    'tanggal_mulai_data' => $request->get('tanggal_mulai_data'),
                ));
        // dd($pembayaran);
        $info_perusahaan->save();
        return redirect('setting-perusahaan')->with('status', 'Perusahaan dengan nama '.$request->get('nama_perusahaan').' berhasil ditambahkan');
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
