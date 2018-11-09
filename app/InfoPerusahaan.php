<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoPerusahaan extends Model
{
    protected $fillable = [
        'id_user','nama_perusahaan', 'alamat', 'telefon', 'fax', 'alamat', 'email', 'tanggal_mulai_data',
    ];
}
