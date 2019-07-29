<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeriodeHasAkun extends Model
{
    protected $table = 'periode_has_akuns';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'id_periode',
        'id_akun',
        'nama_akun',
        'salde_awal',
        'saldo_akhir',
        'created_at',
        'updated_at'
    ];

    public function rasio()
    {
        return $this->belongsTo('App\Periode', 'id_periode');
    }

    public function akun()
    {
        return $this->belongsTo('App\Akun', 'id_akun');
    }
}
