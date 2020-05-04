<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $hidden = ['created_at', 'updated_at'];
    protected $table = "rumah_sakit";
}
