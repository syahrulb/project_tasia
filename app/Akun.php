<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $table = 'akuns';
    protected $primaryKey = 'id_akun';
    protected $fillable = [
        'nama_akun',
        'saldo_akun',
    ];
    public function akunhaspengelompokan()
    {return $this->hasMany('App\AkunHasPengelompokan', 'id_akun','id');}
}
