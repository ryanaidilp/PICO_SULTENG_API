<?php

namespace App\Models;

use App\Models\HospitalBed;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HospitalBedType extends Model
{
    protected $table = 'hospital_bed_types';
    protected $guarded = [];

    /**
     * Get all of the beds for the HospitalBedType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function beds(): HasMany
    {
        return $this->hasMany(HospitalBed::class, 'hospital_bed_type_id', 'id');
    }
}
