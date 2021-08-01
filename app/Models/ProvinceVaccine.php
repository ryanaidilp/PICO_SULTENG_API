<?php

namespace App\Models;

use App\Models\Province;
use App\Models\NationalVaccine;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProvinceVaccine extends Model
{
    use HasEagerLimit;

    protected $table = 'province_vaccines';
    protected $guarded = [];

    /**
     * Get the national_vaccine that owns the ProvinceVaccine
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function national_vaccine(): BelongsTo
    {
        return $this->belongsTo(NationalVaccine::class, 'day', 'id');
    }

    /**
     * Get the province that owns the ProvinceVaccine
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }
}
