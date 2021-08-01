<?php

namespace App\Models;

use App\Models\Regency;
use App\Models\NationalCase;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegencyCase extends Model
{
    use HasEagerLimit;

    protected $table = 'regency_cases';
    protected $guarded = [];
    protected $appends = [
        "death_ratio",
        "under_treatment",
        "cumulative_under_treatment",
        "active_person_under_supervision",
        "active_person_under_observation",
    ];

    /**
     * Get the regency that owns the RegencyCase
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function regency(): BelongsTo
    {
        return $this->belongsTo(Regency::class, 'regency_id', 'id');
    }

    /**
     * Get the national_case that owns the RegencyCase
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function national_case(): BelongsTo
    {
        return $this->belongsTo(NationalCase::class, 'day', 'id');
    }

    // Accessors & Mutators
    public function getDeathRatioAttribute()
    {
        return ($this->cumulative_positive > 0) ?
            percentageValue($this->cumulative_positive, $this->cumulative_deceased) : 0;
    }

    public function getUnderTreatmentAttribute()
    {
        return $this->positive - ($this->recovered + $this->deceased);
    }

    public function getCumulativeUnderTreatmentAttribute()
    {
        return $this->cumulative_positive - ($this->cumulative_recovered + $this->cumulative_deceased);
    }

    public function getActivePersonUnderSupervisionAttribute()
    {
        return $this->cumulative_person_under_supervision - $this->cumulative_finished_person_under_supervision;
    }

    public function getActivePersonUnderObservationAttribute()
    {
        return $this->cumulative_person_under_observation - $this->cumulative_finished_person_under_observation;
    }
}
