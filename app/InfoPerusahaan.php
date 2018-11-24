<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoPerusahaan extends Model
{
    protected $table = 'info_perusahaans';
    protected $primaryKey = 'id_info_perusahaan';
    protected $fillable = [
        'id_user','nama_perusahaan','bidang_perusahaan', 'alamat', 'telefon', 'fax', 'alamat', 'email', 'tanggal_mulai_data',
    ];
}
