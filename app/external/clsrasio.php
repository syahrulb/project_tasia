<?php

namespace App\external;
use DB;
use Response;
use App\PeriodeHasAkun;
use App\AkunHasPengelompokan;
use App\RasioHasPengelompokan;
use App\Rasio;
use Redirect;
use Carbon\Carbon;
class clsrasio
{
  #local variable
  private $tipe;
  #Properties
    #Properties Set
    public function setTipe($q){$this->tipe = $q;}
    #Properties Get
    public function getTipe(){return $this->tipe;}
  #end Properties
  #Constructor
    #default Constructor
    public function __construct($angka)
    {
      $this->setTipe($angka);
    }
  #end Constructor
  #Method
    public function responseTipe()
    {
      if ($this->getTipe()==1) {
        $datas = array(["label"=>'1','data'=>$this->rasio(1,4)],["label"=>'2','data'=>$this->rasio(1,2)],["label"=>'3','data'=>$this->rasio(2,5)],["label"=>'4','data'=>$this->rasio(6,1)]);
        return $datas;
      }
      else {
        $datas = array(["label"=>'5','data'=>$this->rasio(7,8)],["label"=>'6','data'=>$this->rasio(10,8)],["label"=>'7','data'=>$this->rasio(9,10)],["label"=>'8','data'=>$this->rasio(7,10)],
        ["label"=>'9','data'=>$this->rasio(11,10)],["label"=>'10','data'=>$this->rasio(13,10)],["label"=>'11','data'=>$this->rasio(7,3)],["label"=>'12','data'=>$this->rasio(11,4)]);
        return $datas;
      }
    }
    public function rasio($item,$item2)
    {
      $modalsendiri = AkunHasPengelompokan::select('id_akun')->Where('id_kelompok',$item)->get();
      $arrmodalsendiri = array();
      foreach ($modalsendiri as $key => $value)
        {array_push($arrmodalsendiri,$value->id_akun);}
      $totalAktivas = AkunHasPengelompokan::select('id_akun')->Where('id_kelompok',$item2)->get();
      $arrtotalAktiva = array();
      foreach ($totalAktivas as $key => $value)
        {array_push($arrtotalAktiva,$value->id_akun);}
      $sum1 =PeriodeHasAkun::whereIn('id_akun',$arrmodalsendiri)->sum('saldo_akhir');
      $sum2 =PeriodeHasAkun::whereIn('id_akun',$arrtotalAktiva)->sum('saldo_akhir');
      $getrasio = RasioHasPengelompokan::select('id_rasio')->whereIn('id_kelompok',[$item2,$item])->get();
      $arrayrasio = array();
      foreach ($getrasio as $key => $value)
        {array_push($arrayrasio,$value->id_rasio);}
      $kriteria = Rasio::select(DB::raw("rasios.id_rasio, rasio_has_kriteria.operator, rasio_has_kriteria.nilai_batas, rasio_has_kriteria.kriteria"))
          ->join('rasio_has_kriteria', 'rasios.id_rasio', '=', 'rasio_has_kriteria.id_rasio')
          ->whereIn('rasios.id_rasio',$arrayrasio)
          ->get();
      $statuskriteria ='';
      foreach ($kriteria as $key => $value)
      {
        if (version_compare(($sum1/$sum2), $value['nilai_batas'], $value['operator'])) {
            $statuskriteria = $value['kriteria'];
            break;
        }
      }
      $datas = array();
      array_push($datas,($sum1/$sum2));
      array_push($datas,($statuskriteria));
      return $datas;
    }
  #end Method

}
