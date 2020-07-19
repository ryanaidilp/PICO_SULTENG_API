<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestHistory extends Model
{
    protected $guarded = [];

    protected $appends = [
        'pcr_total',
        'rdt_total'
    ];

    public function stat()
    {
        return $this->belongsTo(Stats::class, 'day', 'id');
    }

    public function getPcrTotalAttribute()
    {
        return $this->pcr_positive + $this->pcr_invalid + $this->pcr_negative + $this->pcr_process;
    }

    public function getRdtTotalAttribute()
    {
        return $this->rdt_positive + $this->rdt_invalid + $this->rdt_negative + $this->rdt_process;
    }
}
