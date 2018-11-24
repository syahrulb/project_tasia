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
}
