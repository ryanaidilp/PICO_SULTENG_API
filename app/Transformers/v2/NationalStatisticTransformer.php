<?php

namespace App\Transformers\v2;

use App\NationalCaseHistory;
use League\Fractal\TransformerAbstract;

class NationalStatisticTransformer extends TransformerAbstract
{
    public function transform(NationalCaseHistory $nationalCaseHistory)
    {
        $weekly_positive_avg = 0;
        $weekly_under_treatment_avg = 0;
        $weekly_deceased_avg = 0;
        $weekly_recovered_avg = 0;
        if ($nationalCaseHistory->day == 1) {
            $weekly_positive_avg = $nationalCaseHistory->daily_positive_case;
            $weekly_under_treatment_avg = $nationalCaseHistory->daily_under_treatment_case;
            $weekly_deceased_avg = $nationalCaseHistory->daily_deceased_case;
            $weekly_recovered_avg = $nationalCaseHistory->daily_recovered_case;
        } elseif ($nationalCaseHistory->day == 2) {
            $weekly_positive_avg = (float) round(NationalCaseHistory::whereBetween('day', [1, 2])->sum('daily_positive_case') / 2, 2);
            $weekly_under_treatment_avg = (float) round(NationalCaseHistory::whereBetween('day', [1, 2])->sum('daily_under_treatment_case') / 2, 2);
            $weekly_deceased_avg = (float) round(NationalCaseHistory::whereBetween('day', [1, 2])->sum('daily_deceased_case') / 2, 2);
            $weekly_recovered_avg = (float) round(NationalCaseHistory::whereBetween('day', [1, 2])->sum('daily_recovered_case') / 2, 2);
        } elseif ($nationalCaseHistory->day == 3) {
            $weekly_positive_avg = (float) round(NationalCaseHistory::whereBetween('day', [1, 3])->sum('daily_positive_case') / 3, 2);
            $weekly_under_treatment_avg = (float) round(NationalCaseHistory::whereBetween('day', [1, 3])->sum('daily_under_treatment_case') / 3, 2);
            $weekly_deceased_avg = (float) round(NationalCaseHistory::whereBetween('day', [1, 3])->sum('daily_deceased_case') / 3, 2);
            $weekly_recovered_avg = (float) round(NationalCaseHistory::whereBetween('day', [1, 3])->sum('daily_recovered_case') / 3, 2);
        } elseif ($nationalCaseHistory->day == 4) {
            $weekly_positive_avg = (float) round(NationalCaseHistory::whereBetween('day', [1, 4])->sum('daily_positive_case') / 4, 2);
            $weekly_under_treatment_avg = (float) round(NationalCaseHistory::whereBetween('day', [1, 4])->sum('daily_under_treatment_case') / 4, 2);
            $weekly_deceased_avg = (float) round(NationalCaseHistory::whereBetween('day', [1, 4])->sum('daily_deceased_case') / 4, 2);
            $weekly_recovered_avg = (float) round(NationalCaseHistory::whereBetween('day', [1, 4])->sum('daily_recovered_case') / 4, 2);
        } elseif ($nationalCaseHistory->day == 5) {
            $weekly_positive_avg = (float) round(NationalCaseHistory::whereBetween('day', [1, 5])->sum('daily_positive_case') / 5, 2);
            $weekly_under_treatment_avg = (float) round(NationalCaseHistory::whereBetween('day', [1, 5])->sum('daily_under_treatment_case') / 5, 2);
            $weekly_deceased_avg = (float) round(NationalCaseHistory::whereBetween('day', [1, 5])->sum('daily_deceased_case') / 5, 2);
            $weekly_recovered_avg = (float) round(NationalCaseHistory::whereBetween('day', [1, 5])->sum('daily_recovered_case') / 5, 2);
        } elseif ($nationalCaseHistory->day == 6) {
            $weekly_positive_avg = (float) round(NationalCaseHistory::whereBetween('day', [1, 6])->sum('daily_positive_case') / 6, 2);
            $weekly_under_treatment_avg = (float) round(NationalCaseHistory::whereBetween('day', [1, 6])->sum('daily_under_treatment_case') / 6, 2);
            $weekly_deceased_avg = (float) round(NationalCaseHistory::whereBetween('day', [1, 6])->sum('daily_deceased_case') / 6, 2);
            $weekly_recovered_avg = (float) round(NationalCaseHistory::whereBetween('day', [1, 6])->sum('daily_recovered_case') / 6, 2);
        } elseif ($nationalCaseHistory->day >= 7) {
            $weekly_positive_avg = (float) round(NationalCaseHistory::whereBetween('day', [$nationalCaseHistory->day - 6, $nationalCaseHistory->day])->sum('daily_positive_case') / 7, 2);
            $weekly_under_treatment_avg = (float) round(NationalCaseHistory::whereBetween('day', [$nationalCaseHistory->day - 6, $nationalCaseHistory->day])->sum('daily_under_treatment_case') / 7, 2);
            $weekly_deceased_avg = (float) round(NationalCaseHistory::whereBetween('day', [$nationalCaseHistory->day - 6, $nationalCaseHistory->day])->sum('daily_deceased_case') / 7, 2);
            $weekly_recovered_avg = (float) round(NationalCaseHistory::whereBetween('day', [$nationalCaseHistory->day - 6, $nationalCaseHistory->day])->sum('daily_recovered_case') / 7, 2);
        }

        return [
            trans('general.day') => $nationalCaseHistory->day,
            trans('general.date') => $nationalCaseHistory->date,
            trans('general.cumulative') => [
                trans('general.positive') => $nationalCaseHistory->cumulative_positive,
                trans('general.under_treatment') => $nationalCaseHistory->cumulative_under_treatment,
                trans('general.recovered') => $nationalCaseHistory->cumulative_recovered,
                trans('general.death') => $nationalCaseHistory->cumulative_deceased,
            ],
            trans('general.new_case') => [
                trans('general.positive') => $nationalCaseHistory->daily_positive_case,
                trans('general.under_treatment') => $nationalCaseHistory->daily_under_treatment_case,
                trans('general.recovered') => $nationalCaseHistory->daily_recovered_case,
                trans('general.death') => $nationalCaseHistory->daily_deceased_case,
            ],
            trans('general.recap') => [
                trans('general.percentage') => [
                    trans('general.under_treatment') => $nationalCaseHistory->under_treatment_percentage,
                    trans('general.death') => $nationalCaseHistory->deceased_percentage,
                    trans('general.recovered') => $nationalCaseHistory->recovered_percentage
                ],
                trans('general.average') => [
                    trans('general.daily') => [
                        trans('general.positive') => $nationalCaseHistory->daily_positive_average,
                        trans('general.under_treatment') => $nationalCaseHistory->daily_under_treatment_average,
                        trans('general.death') => $nationalCaseHistory->daily_deceased_average,
                        trans('general.recovered') => $nationalCaseHistory->daily_recovered_average
                    ],
                    trans('general.weekly') => [
                        trans('general.positive') => $weekly_positive_avg,
                        trans('general.under_treatment') => $weekly_under_treatment_avg,
                        trans('general.death') => $weekly_deceased_avg,
                        trans('general.recovered') => $weekly_recovered_avg,
                    ]
                ]
            ]
        ];
    }
}
