<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AkunHasPengelompokan extends Model
{
    protected $table = 'akun_has_pengelompokans';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_akun',
        'id_kelompok',
    ];

    public function akun()
    {
    	return $this->belongsTo('App\Akun', 'id_akun');
    }
    public function kelompok()
    {
    	return $this->belongsTo('App\Pengelompokan', 'id_kelompok');
    }
}
