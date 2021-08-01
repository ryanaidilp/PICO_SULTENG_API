<?php

namespace App\Models;

use App\Models\ProvinceCase;
use App\Models\ProvinceGenderCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NationalCase extends Model
{
    protected $table = 'national_cases';
    protected $guarded = [];
    protected $appends = [
        "death_ratio",
        "under_treatment",
        "recovered_percentage",
        "under_treatment_percentage",
        "cumulative_under_treatment"
    ];
    protected $casts = [
        'date' => 'datetime'
    ];

    /**
     * Get all of the province_cases for the NationalCase
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function province_cases(): HasMany
    {
        return $this->hasMany(ProvinceCase::class, 'day', 'id');
    }

    /**
     * Get all of the province_gender_cases for the NationalCase
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function province_gender_cases(): HasMany
    {
        return $this->hasMany(ProvinceGenderCase::class, 'day', 'id');
    }


    //  Mutators & Accessors
    public function getDeathRatioAttribute()
    {
        return ($this->cumulative_positive > 0) ?
            \percentageValue($this->cumulative_positive, $this->cumulative_deceased) : 0;
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
}
