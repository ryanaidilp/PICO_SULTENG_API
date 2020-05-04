<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $hidden = ['created_at'];
    protected $table = "provinsi";
    protected $guarded = [];
    protected $casts = [
        'kode_provinsi' => 'integer',
        'positif' => 'integer',
        'sembuh' => 'integer',
        'meninggal' => 'integer',
    ];
}
