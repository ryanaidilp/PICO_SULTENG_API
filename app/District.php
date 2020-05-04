<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'kabupaten';
    protected $guarded = [];
    protected $hidden = ['created_at'];
    protected $appends = ['dalam_pengawasan', 'dalam_pemantauan'];
    protected $casts = [
        'no' => 'integer',
        'ODP' => 'integer',
        'PDP' => 'integer',
        'positif' => 'integer',
        'negatif' => 'integer',
        'sembuh' => 'integer',
        'meninggal' => 'integer',
        'selesai_pengawasan' => 'integer',
        'selesai_pemantauan' => 'integer',
    ];

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
