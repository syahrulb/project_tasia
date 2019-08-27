<?php

namespace App\external;
use DB;
use Response;
use App\JenisRasio;
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
      return "oke";
    }
    private function rasio1()
    {
      $akuns = User::whereHas('posts', function($q){
                          $q->where('created_at', '>=', '2015-01-01 00:00:00');
                      })->get();
    }
  #end Method

}
