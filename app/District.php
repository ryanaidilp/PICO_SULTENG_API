<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'kabupaten';
    protected $guarded = [];
    protected $appends = ['dalam_pengawasan', 'dalam_pemantauan'];

    public function posts()
    {
        return $this->hasMany(Posts::class, 'kode_kabupaten', 'no');
    }

    public function getDalamPengawasanAttribute()
    {
        return $this->PDP - $this->selesai_pengawasan;
    }

    public function getDalamPemantauanAttribute()
    {
        return $this->ODP - $this->selesai_pemantauan;
    }
}
