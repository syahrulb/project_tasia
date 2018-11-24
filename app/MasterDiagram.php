<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterDiagram extends Model
{
    protected $table = 'master_diagrams';
    protected $primaryKey = 'id_master_diagram';
    protected $fillable = [
        'bentuk_diagram'
    ];

    public function jenisRasio()
    {
        return $this->hasMany('App\JenisRasio', 'id_master_diagram');
    }
}
