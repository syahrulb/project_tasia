<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisRasio extends Model
{
    protected $table = 'jenis_rasios';
    protected $primaryKey = 'id_jenis_rasio';
    protected $fillable = [
        'jenis_rasio', 'master_diagram'
    ];

    public function masterDiagram()
    {
        return $this->belongsTo('App\MasterDiagram', 'master_diagram');
    }

    public function rasio()
    {
        return $this->hasMany('App\Rasio', 'id_jenis_rasio');
    }
}
