<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = "phone";
    public function posko()
    {
        return $this->belongsTo(Posko::class, 'id_posko');
    }
}
