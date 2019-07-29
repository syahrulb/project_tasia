<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RasioHasKriteria extends Model
{
    protected $table = 'rasio_has_kriteria';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'id_rasio',
        'operator',
        'nilai_batas',
        'kriteria'
    ];

    public function rasio()
    {
        return $this->belongsTo('App\Rasio', 'id_rasio');
    }
}
