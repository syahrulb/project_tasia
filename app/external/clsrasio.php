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
        $datas = array('1'=>$this->rasio1(),'2'=>$this->rasio2(),'3'=>$this->rasio3(),'4'=>$this->rasio4());
        return $datas;
      }
      else {
        $datas = array('5'=>$this->rasio5(),'6'=>$this->rasio6(),'7'=>$this->rasio7(),'8'=>$this->rasio8(),'9'=>$this->rasio9(),'10'=>$this->rasio10(),'11'=>$this->rasio11(),'12'=>$this->rasio12());
        return $datas;
      }
    }
    public function rasio1()
    {
      $modalsendiri = AkunHasPengelompokan::select('id_akun')->Where('id_kelompok',1)->get();
      $arrmodalsendiri = array();
      foreach ($modalsendiri as $key => $value)
        {array_push($arrmodalsendiri,$value->id_akun);}
      $totalAktivas = AkunHasPengelompokan::select('id_akun')->Where('id_kelompok',4)->get();
      $arrtotalAktiva = array();
      foreach ($totalAktivas as $key => $value)
        {array_push($arrtotalAktiva,$value->id_akun);}
      $sumaktiva =PeriodeHasAkun::whereIn('id_akun',$arrmodalsendiri)->sum('saldo_akhir');
      $sumakmodal =PeriodeHasAkun::whereIn('id_akun',$arrtotalAktiva)->sum('saldo_akhir');
      return $sumakmodal/$sumaktiva;
    }
    public function rasio2()
    {
      $item1 = AkunHasPengelompokan::select('id_akun')->Where('id_kelompok',1)->get();
      $arritem1 = array();
      foreach ($item1 as $key => $value)
        {array_push($arritem1,$value->id_akun);}
      $item2 = AkunHasPengelompokan::select('id_akun')->Where('id_kelompok',2)->get();
      $arritem2 = array();
      foreach ($item2 as $key => $value)
        {array_push($arritem2,$value->id_akun);}
      $modal =PeriodeHasAkun::whereIn('id_akun',$item1)->sum('saldo_akhir');
      $aktivatetap =PeriodeHasAkun::whereIn('id_akun',$item2)->sum('saldo_akhir');
      return $modal/$aktivatetap;
    }
    public function rasio3()
    {
      $item1 = AkunHasPengelompokan::select('id_akun')->Where('id_kelompok',2)->get();
      $arritem1 = array();
      foreach ($item1 as $key => $value)
        {array_push($arritem1,$value->id_akun);}
      $item2 = AkunHasPengelompokan::select('id_akun')->Where('id_kelompok',5)->get();
      $arritem2 = array();
      foreach ($item2 as $key => $value)
        {array_push($arritem2,$value->id_akun);}
      $aktivatetap =PeriodeHasAkun::whereIn('id_akun',$item1)->sum('saldo_akhir');
      $hutangjangkapanjang =PeriodeHasAkun::whereIn('id_akun',$item2)->sum('saldo_akhir');
      return $aktivatetap/$hutangjangkapanjang;
    }
    public function rasio4()
    {
      $item1 = AkunHasPengelompokan::select('id_akun')->Where('id_kelompok',6)->get();
      $arritem1 = array();
      foreach ($item1 as $key => $value)
        {array_push($arritem1,$value->id_akun);}
      $item2 = AkunHasPengelompokan::select('id_akun')->Where('id_kelompok',1)->get();
      $arritem2 = array();
      foreach ($item2 as $key => $value)
        {array_push($arritem2,$value->id_akun);}
      $hutang =PeriodeHasAkun::whereIn('id_akun',$item1)->sum('saldo_akhir');
      $aktiva =PeriodeHasAkun::whereIn('id_akun',$item2)->sum('saldo_akhir');
      return $hutang/$aktiva;
    }
    public function rasio5()
    {
      $item1 = AkunHasPengelompokan::select('id_akun')->Where('id_kelompok',7)->get();
      $arritem1 = array();
      foreach ($item1 as $key => $value)
        {array_push($arritem1,$value->id_akun);}
      $item2 = AkunHasPengelompokan::select('id_akun')->Where('id_kelompok',8)->get();
      $arritem2 = array();
      foreach ($item2 as $key => $value)
        {array_push($arritem2,$value->id_akun);}
      $labausaha =PeriodeHasAkun::whereIn('id_akun',$item1)->sum('saldo_akhir');
      $aktivausaha =PeriodeHasAkun::whereIn('id_akun',$item2)->sum('saldo_akhir');
      return $labausaha/$aktivausaha;
    }
    public function rasio6()
    {
      $item1 = AkunHasPengelompokan::select('id_akun')->Where('id_kelompok',10)->get();
      $arritem1 = array();
      foreach ($item1 as $key => $value)
        {array_push($arritem1,$value->id_akun);}
      $item2 = AkunHasPengelompokan::select('id_akun')->Where('id_kelompok',8)->get();
      $arritem2 = array();
      foreach ($item2 as $key => $value)
        {array_push($arritem2,$value->id_akun);}
      $penjualan =PeriodeHasAkun::whereIn('id_akun',$item1)->sum('saldo_akhir');
      $aktivausaha =PeriodeHasAkun::whereIn('id_akun',$item2)->sum('saldo_akhir');
      return $penjualan/$aktivausaha;
    }
    public function rasio7()
    {
      $item1 = AkunHasPengelompokan::select('id_akun')->Where('id_kelompok',9)->get();
      $arritem1 = array();
      foreach ($item1 as $key => $value)
        {array_push($arritem1,$value->id_akun);}
      $item2 = AkunHasPengelompokan::select('id_akun')->Where('id_kelompok',10)->get();
      $arritem2 = array();
      foreach ($item2 as $key => $value)
        {array_push($arritem2,$value->id_akun);}
      $labakotor =PeriodeHasAkun::whereIn('id_akun',$item1)->sum('saldo_akhir');
      $penjualan =PeriodeHasAkun::whereIn('id_akun',$item2)->sum('saldo_akhir');
      return $labakotor/$penjualan;
    }
    public function rasio8()
    {
      $item1 = AkunHasPengelompokan::select('id_akun')->Where('id_kelompok',7)->get();
      $arritem1 = array();
      foreach ($item1 as $key => $value)
        {array_push($arritem1,$value->id_akun);}
      $item2 = AkunHasPengelompokan::select('id_akun')->Where('id_kelompok',10)->get();
      $arritem2 = array();
      foreach ($item2 as $key => $value)
        {array_push($arritem2,$value->id_akun);}
      $labausaha =PeriodeHasAkun::whereIn('id_akun',$item1)->sum('saldo_akhir');
      $penjualan =PeriodeHasAkun::whereIn('id_akun',$item2)->sum('saldo_akhir');
      return $labausaha/$penjualan;
    }
    public function rasio9()
    {
      $item1 = AkunHasPengelompokan::select('id_akun')->Where('id_kelompok',11)->get();
      $arritem1 = array();
      foreach ($item1 as $key => $value)
        {array_push($arritem1,$value->id_akun);}
      $item2 = AkunHasPengelompokan::select('id_akun')->Where('id_kelompok',10)->get();
      $arritem2 = array();
      foreach ($item2 as $key => $value)
        {array_push($arritem2,$value->id_akun);}
      $lababersih =PeriodeHasAkun::whereIn('id_akun',$item1)->sum('saldo_akhir');
      $penjualan =PeriodeHasAkun::whereIn('id_akun',$item2)->sum('saldo_akhir');
      return $lababersih/$penjualan;
    }
    public function rasio10()
    {
      $item1 = AkunHasPengelompokan::select('id_akun')->Where('id_kelompok',13)->get();
      $arritem1 = array();
      foreach ($item1 as $key => $value)
        {array_push($arritem1,$value->id_akun);}
      $item2 = AkunHasPengelompokan::select('id_akun')->Where('id_kelompok',10)->get();
      $arritem2 = array();
      foreach ($item2 as $key => $value)
        {array_push($arritem2,$value->id_akun);}
      $biayaoperasi =PeriodeHasAkun::whereIn('id_akun',$item1)->sum('saldo_akhir');
      $penjualan =PeriodeHasAkun::whereIn('id_akun',$item2)->sum('saldo_akhir');
      return $biayaoperasi/$penjualan;
    }
    public function rasio11()
    {
      $item1 = AkunHasPengelompokan::select('id_akun')->Where('id_kelompok',7)->get();
      $arritem1 = array();
      foreach ($item1 as $key => $value)
        {array_push($arritem1,$value->id_akun);}
      $item2 = AkunHasPengelompokan::select('id_akun')->Where('id_kelompok',3)->get();
      $arritem2 = array();
      foreach ($item2 as $key => $value)
        {array_push($arritem2,$value->id_akun);}
      $labausaha =PeriodeHasAkun::whereIn('id_akun',$item1)->sum('saldo_akhir');
      $aktivaoperasi =PeriodeHasAkun::whereIn('id_akun',$item2)->sum('saldo_akhir');
      return $labausaha/$aktivaoperasi;
    }
    public function rasio12()
    {
      $item1 = AkunHasPengelompokan::select('id_akun')->Where('id_kelompok',11)->get();
      $arritem1 = array();
      foreach ($item1 as $key => $value)
        {array_push($arritem1,$value->id_akun);}
      $item2 = AkunHasPengelompokan::select('id_akun')->Where('id_kelompok',4)->get();
      $arritem2 = array();
      foreach ($item2 as $key => $value)
        {array_push($arritem2,$value->id_akun);}
      $lababersih =PeriodeHasAkun::whereIn('id_akun',$item1)->sum('saldo_akhir');
      $modalsendiri =PeriodeHasAkun::whereIn('id_akun',$item2)->sum('saldo_akhir');
      return $lababersih/$modalsendiri;
    }
  #end Method

}
