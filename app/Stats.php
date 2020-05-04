<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Stats extends Model
{
    protected $guarded = [];
    protected $hidden = ['id', 'created_at', 'updated_at'];
    protected $appends = [
        'death_percentage',
        'recovered_percentage',
        'under_treatment_percentage',
        'daily_positive_case',
        'daily_recovered_case',
        'daily_death_case'
    ];
    protected $casts = [
        'positive' => 'integer',
        'cumulative_positive' => 'integer',
        'death' => 'integer',
        'cumulative_death' => 'integer',
        'recovered' => 'integer',
        'cumulative_recovered' => 'integer',
    ];

    public function getDeathPercentageAttribute()
    {
        return $this->calculatePercentage($this->cumulative_death, $this->cumulative_positive);
    }

    public function getDayAttribute($value)
    {
        return (int) $value;
    }

    public function getDateAttribute($value)
    {
        $date = strtotime($value);
        $newDate = Carbon::parse($date);
        $newDate->setTimezone('Asia/Makassar');
        return $newDate->format('d M Y');
    }

    public function getRecoveredPercentageAttribute()
    {
        return $this->calculatePercentage($this->cumulative_recovered, $this->cumulative_positive);
    }

    public function getUnderTreatmentPercentageAttribute()
    {
        $underTreatment = ($this->cumulative_positive - ($this->cumulative_death + $this->cumulative_recovered));
        return $this->calculatePercentage($underTreatment, $this->cumulative_positive);
    }

    public function getDailyPositiveCaseAttribute()
    {
        return $this->averageCount($this->cumulative_positive, $this->day);
    }

    public function getDailyRecoveredCaseAttribute()
    {
        return $this->averageCount($this->cumulative_recovered, $this->day);
    }

    public function getDailyDeathCaseAttribute()
    {
        return $this->averageCount($this->cumulative_death, $this->day);
    }

    private function calculatePercentage($n, $sum)
    {
        if ($sum == 0) {
            return 0;
        }
        $percentage = ($n / $sum) * 100;
        return (float) number_format($percentage, 2);
    }

    private function averageCount($sum, $total)
    {
        $data = $sum / (int) $total;
        return (float) number_format($data, 2);
    }
}
