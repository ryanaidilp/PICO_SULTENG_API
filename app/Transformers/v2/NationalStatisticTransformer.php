<?php

namespace App\Transformers\v2;

use App\NationalCaseHistory;
use League\Fractal\TransformerAbstract;

class NationalStatisticTransformer extends TransformerAbstract
{
    public function transform(NationalCaseHistory $nationalCaseHistory)
    {
        return [
            trans('general.day') => $nationalCaseHistory->day,
            trans('general.date') => $nationalCaseHistory->date,
            trans('general.cumulative') => [
                trans('general.positive') => $nationalCaseHistory->cumulative_positive,
                trans('general.recovered') => $nationalCaseHistory->cumulative_recovered,
                trans('general.death') => $nationalCaseHistory->cumulative_deceased,
            ],
            trans('general.new_case') => [
                trans('general.positive') => $nationalCaseHistory->daily_positive_case,
                trans('general.recovered') => $nationalCaseHistory->daily_recovered_case,
                trans('general.death') => $nationalCaseHistory->daily_deceased_case,
            ],
        ];
    }
}
