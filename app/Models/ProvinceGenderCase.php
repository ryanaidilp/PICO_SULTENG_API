<?php

namespace App\Models;

use App\Models\Province;
use App\Models\NationalCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProvinceGenderCase extends Model
{
    protected $table = 'province_gender_cases';
    protected $guarded = [];

    /**
     * Get the national_case that owns the ProvinceGenderCase
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function national_case(): BelongsTo
    {
        return $this->belongsTo(NationalCase::class, 'day', 'id');
    }

    /**
     * Get the province that owns the ProvinceGenderCase
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }
}
