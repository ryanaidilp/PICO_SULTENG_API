<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $hidden = ['created_at'];
    protected $table = "provinsi";
    protected $guarded = [];
}
