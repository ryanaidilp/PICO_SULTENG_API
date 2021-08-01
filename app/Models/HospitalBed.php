<?php

namespace App\Models;

use App\Models\Hospital;
use App\Models\HospitalBedType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HospitalBed extends Model
{
    protected $table = 'hospital_beds';
    protected $guarded = [];

    /**
     * Get the bed_type that owns the HospitalBed
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bed_type(): BelongsTo
    {
        return $this->belongsTo(HospitalBedType::class, 'hospital_bed_type_id', 'id');
    }

    /**
     * Get the hospital that owns the HospitalBed
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hospital(): BelongsTo
    {
        return $this->belongsTo(Hospital::class, 'hospital_id', 'id');
    }
}
