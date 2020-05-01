<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'kabupaten';
    protected $guarded = [];

    public function posts()
    {
        return $this->hasMany(Posts::class, 'kode_kabupaten', 'no');
    }
}
