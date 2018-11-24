<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RasioHasPengelompokan extends Model
{
    protected $table = 'rasio_has_pengelompokans';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_rasio',
        'id_kelompok',
    ];

    public function rasio()
    {
    	return $this->belongsTo('App\Rasio', 'id_rasio');
    }
    public function kelompok()
    {
    	return $this->belongsTo('App\Pengelompokan', 'id_kelompok');
    }
}
