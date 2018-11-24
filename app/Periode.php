<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $table = 'periodes';
    protected $primaryKey = 'id_periode';

    protected $fillable = [
        'tanggal_awal',
        'tanggal_akhir',
    ];
}
