<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table = 'kabupaten';

    public function posko()
    {
        return $this->hasMany(Posko::class, 'kode_kabupaten', 'no');
    }
}
