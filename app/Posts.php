<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
 protected $table = "posko";

 public function phones()
 {
  return $this->hasMany(Phone::class, "id_posko", "id");
 }

 public function district()
 {
  return $this->belongsTo(District::class, 'no');
 }
}
