<?php

namespace App\Http\Controllers;

use App\Akun;
use App\AkunHasPengelompokan;
use App\Pengelompokan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PengaturanAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $akuns = Akun::all();
        return view('ringkasan.index_akun', compact('akuns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('ringkasan.create_akun');
    }

    public function pengaturan()
    {
        $akuns = akun::all();
        $pengelompokans = Pengelompokan::all();
        $akun_has_pengelompokans = AkunHasPengelompokan::all();
        
        return view('ringkasan.akun', compact('akuns', 'pengelompokans', 'akun_has_pengelompokans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        // $akunhaskelompok['id_akun'] = implode(",", $request->id_akun);
        $dataset_new = [];
        $dataset_del = [];
        if (isset($request->id_akun)) {
            foreach ($request->id_akun as $akun) {
                /*                dd($akun['id_akun']);*/
                if (isset($akun['id_akun']) && $akun['id_rasio_akun'] == null) {
                    $dataset_new[] = [
                        'id_akun' => $akun['id_akun'],
                        'id_kelompok' => $request->id_kelompok,
                    ];
                }

                if (!isset($akun['id_akun']) && $akun['id_rasio_akun'] != null) {
                    $dataset_del[] = $akun['id_rasio_akun'];
                }
            }

            if (sizeof($dataset_new) != 0) {
                AkunHasPengelompokan::insert($dataset_new);
            }

            if (sizeof($dataset_del) != 0) {
                AkunHasPengelompokan::whereIn('id', $dataset_del)->delete();
            }

        } else {
            $akun = AkunHasPengelompokan::where('id_kelompok', $request->id_kelompok)->delete();
            if ($akun) {
                return redirect('/pengaturan-akun');
            }
        }

        // dd($dataset);

        return redirect('/pengaturan-akun/pengaturan');
    }

    public function storeakun(Request $request)
    {
        $request = $request->toArray();
        unset($request['_token']);
        // $akunhaskelompok['id_akun'] = implode(",", $request->id_akun);

        // dd($dataset);
        $save_akun = Akun::insert($request);
        if ($save_akun) {
            return redirect('/pengaturan-akun/')->with('success', 'Akun Berhasil Tambahkan');
        } else {
            return redirect('/pengaturan-akun/')->with('failed', 'Akun Gagal Ditambahkan');
        }
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
       
        // $akuns = akun::all();
        // $pengelompokans = Pengelompokan::find($id);
        // $akun_has_pengelompokans = AkunHasPengelompokan::all();
        // if ($akun->id_akun == $value['id_akun'])
        // // return view('ringkasan.akun', compact('akuns', 'pengelompokans', 'akun_has_pengelompokans'));
        // if ($id == "1" )
        // {
        //     $akuns = DB::table("akuns")
        //         ->where("id_akun", "like", "1%");
        // }
        // return view('ringkasan.akun', compact('akuns', 'pengelompokans', 'akun_has_pengelompokans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $akun = Akun::find($id);
        return view('ringkasan.edit_akun', compact('akun'));
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
        $akun = $request->toArray();

        unset($akun['_token']);
        unset($akun['_method']);
        $save_akun = Akun::where('id_akun', $id)->update($akun);
        if ($save_akun) {
            return redirect('/pengaturan-akun/')->with('success', 'Akun Berhasil Dirubah');
        } else {
            return redirect('/pengaturan-akun/')->with('failed', 'Akun Gagal Dirubah');
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
        $akun = Akun::find($id);
        $del_akun = $akun->delete();
        if ($del_akun) {
            return redirect('/pengaturan-akun/')->with('success', 'Akun has been deleted Successfully');
        } else {
            return redirect('/pengaturan-akun/')->with('failed', 'Akun Gagal Dihapus');
        }

    }

    public function getAkunHasPengelompokan($id_kelompok)
    {

        $akuns = Akun::all();
        $akun_has_pengelompokans = AkunHasPengelompokan::where('id_kelompok', $id_kelompok)->get()->toArray();
        foreach ($akuns as $key => $akun) {
           

            $same = false;
            foreach ($akun_has_pengelompokans as $k => $value) {
                if ($akun->id_akun == $value['id_akun']) {
                    $same = true;
                    $id_rasio_akun = $value['id'];
                }
            }

            //echo $akun->id_akun."<br/>";
            $cetak=false;
            $depan=substr($akun->id_akun,0,1);
            // $depan1=substr($akun->id_akun,1,2);
            // echo $depan1;
            
            
            if ($id_kelompok=="1" || $id_kelompok=="2" || $id_kelompok=="3" || $id_kelompok=="8")
            {
                if ($depan=="1")
                {
                    $cetak=true;
                }   
            }
            elseif ($id_kelompok=="4") {
              if($depan=="3")
              {
                $cetak=true;
              }
            }
            elseif ($id_kelompok=="5" || $id_kelompok=="6" ) {
              if ($depan=="2") {
                $cetak=true;
              }
            }
           elseif ($id_kelompok=="13") {
             if ($depan=="5")
             {
              $cetak=true;
             }
           }
          else
          {
            $cetak=true;
          }

           

            
            
            if ($cetak)
            {
               if ($same == true) {
                    echo '
                          <div class="form-group">
                            <label>
                              <input type="hidden" name="id_akun[' . $key . '][id_rasio_akun]" value="' . $id_rasio_akun . '">
                              <input type="checkbox"  name="id_akun[' . $key . '][id_akun]" class="flat-red" value="' . $akun->id_akun . '" checked="checked">
                              ' . $akun->nama_akun . '
                            </label>
                          </div>
                          ';
                } else {
                    echo '
                          <div class="form-group">
                            <label>
                              <input type="hidden" name="id_akun[' . $key . '][id_rasio_akun]" value="">
                              <input type="checkbox"  name="id_akun[' . $key . '][id_akun]" class="flat-red" value="' . $akun->id_akun . '">
                              ' . $akun->nama_akun . '
                            </label>
                          </div>
                          ';
                }  
            }
           
        }
    }
}
