<?php

namespace App\Models;

use App\Models\ProvinceVaccine;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NationalVaccine extends Model
{

    protected $table = 'national_vaccines';
    protected $guarded  = [];
    protected $casts = [
        "date" => "datetime"
    ];

    /**
     * Get all of the province_vaccines for the NationalVaccine
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function province_vaccines(): HasMany
    {
        return $this->hasMany(ProvinceVaccine::class, 'day', 'id');
    }
}
