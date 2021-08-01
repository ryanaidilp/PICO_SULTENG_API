<?php

namespace App\Models;

use App\Models\Province;
use App\Models\NationalCase;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProvinceCase extends Model
{
    use HasEagerLimit;

    protected $table = 'province_cases';
    protected $guarded = [];
    protected $appends = [
        'death_ratio',
        'under_treatment',
        'recovered_percentage',
        'under_treatment_percentage',
        'cumulative_under_treatment',
        'active_person_under_supervision',
        'active_person_under_observation',
    ];

    /**
     * Get the province that owns the ProvinceCase
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    /**
     * Get the national_case that owns the ProvinceCase
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

    public function getRecoveredPercentageAttribute()
    {
        return ($this->cumulative_positive > 0) ?
            percentageValue($this->cumulative_positive, $this->cumulative_recovered) : 0;
    }

    public function getUnderTreatmentPercentageAttribute()
    {
        $under_treatment = $this->cumulative_positive - ($this->cumulative_recovered + $this->cumulative_deceased);
        return ($this->cumulative_positive > 0) ?
            percentageValue($this->cumulative_positive, $under_treatment) : 0;
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
