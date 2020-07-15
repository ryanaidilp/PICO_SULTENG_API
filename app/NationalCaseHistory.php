<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use JsonFormat;

class NationalCaseHistory extends Model
{
    protected $table = 'national_case_histories';
    protected $casts = [
        'cumulative_positive' => 'integer',
        'cumulative_recovered' => 'integer',
        'cumulative_deceased' => 'integer',
        'daily_positive_case' => 'integer',
        'daily_recovered_case' => 'integer',
        'daily_deceased_case' => 'integer',
    ];
    protected $appends = [
        'under_treatment_percentage',
        'deceased_percentage',
        'recovered_percentage',
        'daily_positive_average',
        'daily_under_treatment_average',
        'daily_deceased_average',
        'daily_recovered_average',
    ];

    public function getUnderTreatmentPercentageAttribute()
    {
        return JsonFormat::percentageValue($this->cumulative_positive, $this->cumulative_under_treatment);
    }

    public function getDeceasedPercentageAttribute()
    {
        return JsonFormat::percentageValue($this->cumulative_positive, $this->cumulative_deceased);
    }

    public function getRecoveredPercentageAttribute()
    {
        return JsonFormat::percentageValue($this->cumulative_positive, $this->cumulative_recovered);
    }

    public function getDailyPositiveAverageAttribute()
    {
        return JsonFormat::averageCount($this->cumulative_positive, $this->day);
    }

    public function getDailyUnderTreatmentAverageAttribute()
    {
        return JsonFormat::averageCount($this->cumulative_under_treatment, $this->day);
    }

    public function getDailyDeceasedAverageAttribute()
    {
        return JsonFormat::averageCount($this->cumulative_deceased, $this->day);
    }

    public function getDailyRecoveredAverageAttribute()
    {
        return JsonFormat::averageCount($this->cumulative_recovered, $this->day);
    }
}
