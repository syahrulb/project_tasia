<?php

namespace App\external;
use DB;
use Response;
use App\PeriodeHasAkun;
use App\AkunHasPengelompokan;
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
        $datas = array('1'=>$this->rasio(1,4),'2'=>$this->rasio(1,2),'3'=>$this->rasio(2,5),'4'=>$this->rasio(6,1));
        return $datas;
      }
      else {
        $datas = array('5'=>$this->rasio(7,8),'6'=>$this->rasio(10,8),'7'=>$this->rasio(9,10),'8'=>$this->rasio(7,10),'9'=>$this->rasio(11,10),'10'=>$this->rasio(13,10),
        '11'=>$this->rasio(7,3),'12'=>$this->rasio(11,4));
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
      return $sum1/$sum2;
    }
  #end Method

}
