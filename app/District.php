<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'kabupaten';
    protected $hidden = ['created_at'];
    protected $appends = ['dalam_pengawasan', 'dalam_pemantauan', 'rasio_kematian'];
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
    public $primaryKey = "no";

    public function posts()
    {
        return $this->hasMany(Posts::class, 'kode_kabupaten', 'no');
    }

    public function history()
    {
        return $this->hasMany(LocalCaseHistory::class, 'district_id', 'no');
    }

    public function getDalamPengawasanAttribute()
    {
        return $this->PDP - $this->selesai_pengawasan;
    }

    public function getDalamPemantauanAttribute()
    {
        return $this->ODP - $this->selesai_pemantauan;
    }

    public function getRasioKematianAttribute()
    {
        return ($this->positif > 0) ? round(($this->meninggal / $this->positif) * 100, 2) : 0;
    }
}
