<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rasio extends Model
{
    protected $table = 'rasios';
    protected $primaryKey = 'id_rasio';

    protected $fillable = [
        'nama_rasio',
        'operator',
        'nilai_batas',
        'jenis_rasio',
    ];

    public function jenisRasio()
    {
    	return $this->belongsTo('App\JenisRasio', 'janis_rasio');
    }
}
