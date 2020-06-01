<?php

namespace App\Transformers;

use App\Stats;
use League\Fractal\TransformerAbstract;

class StatisticTransformer extends TransformerAbstract
{
    public function transform(Stats $stats)
    {
        return
            [
                trans('general.day') => $stats->day,
                trans('general.date') => $stats->date,
                trans('general.positive') => $stats->positive,
                trans('general.cumulative_param', ['case' => 'positive']) => $stats->cumulative_positive,
                trans('general.recovered') => $stats->recovered,
                trans('general.cumulative_param', ['case' => 'recovered']) => $stats->cumulative_recovered,
                trans('general.death') => $stats->death,
                trans('general.cumulative_param', ['case' => 'death']) => $stats->cumulative_death,
                trans('general.percentage_param', ['case' => 'death']) => $stats->death_percentage,
                trans('general.percentage_param', ['case' => 'recovered']) => $stats->recovered_percentage,
                trans('general.percentage_param', ['case' => 'under_treatment']) => $stats->under_treatment_percentage,
                trans('general.daily_param', ['case' => 'positive']) => $stats->daily_positive_case,
                trans('general.daily_param', ['case' => 'recovered']) => $stats->daily_recovered_case,
                trans('general.daily_param', ['case' => 'death']) => $stats->daily_death_case,
            ];
    }
}
