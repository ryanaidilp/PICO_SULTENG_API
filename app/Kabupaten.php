<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table = 'kabupaten';
    protected $guarded = [];

    public function posko()
    {
        return $this->hasMany(Posko::class, 'kode_kabupaten', 'no');
    }
}
