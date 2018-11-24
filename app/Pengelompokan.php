<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengelompokan extends Model
{
    protected $table = 'pengelompokans';
    protected $primaryKey = 'id_kelompok';
    protected $fillable = [
        'kegunaan_akun'
    ];

    public function hasAkun()
    {
        return $this->hasMany('App\AkunHasPengelompokan', 'id_kelompok');
    }

    public function hasRasio()
    {
        return $this->hasMany('App\RasioHasPengelompokan', 'id_kelompok');
    }
}
