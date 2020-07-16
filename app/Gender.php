<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $table = 'genders';

    public function stat()
    {
        return $this->belongsTo(Stats::class, 'day', 'day');
    }
}
