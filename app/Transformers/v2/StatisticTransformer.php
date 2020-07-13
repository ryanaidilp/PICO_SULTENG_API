<?php

namespace App\Transformers\v2;

use App\District;
use App\Gender;
use App\Stats;
use League\Fractal;

class StatisticTransformer extends Fractal\TransformerAbstract
{
    public function transform(Stats $stats)
    {
        $data = array();
        $histories = $stats->histories;
        foreach ($histories as $key => $history) {
            $district = District::where('no', $history->district_id)->first();
            $weekly_positive_avg = $history->day > 7 ? (float) number_format($history->whereBetween('day', [$stats->day - 7, $stats->day])->sum('positive') / 7, 2) : 0;
            $weekly_recovered_avg = $history->day > 7 ? (float) number_format($history->whereBetween('day', [$stats->day - 7, $stats->day])->sum('recovered') / 7, 2) : 0;
            $weekly_death_avg = $history->day > 7 ? (float) number_format($history->whereBetween('day', [$stats->day - 7, $stats->day])->sum('death') / 7, 2) : 0;
            $weekly_ODP_avg = $history->day > 7 ? (float) number_format($history->whereBetween('day', [$stats->day - 7, $stats->day])->sum('new_ODP') / 7, 2) : 0;
            $weekly_PDP_avg = $history->day > 7 ? (float) number_format($history->whereBetween('day', [$stats->day - 7, $stats->day])->sum('new_PDP') / 7, 2) : 0;
            $total_odp = $history->whereBetween('day', [1, $stats->day])->where('district_id', $district->no)->sum('new_ODP');
            $total_pdp = $history->whereBetween('day', [1, $stats->day])->where('district_id', $history->district_id)->sum('new_PDP');
            $total_finished_odp = $history->whereBetween('day', [1, $stats->day])->where('district_id', $history->district_id)->sum('finished_ODP');
            $total_finished_pdp = $history->whereBetween('day', [1, $stats->day])->where('district_id', $history->district_id)->sum('finished_PDP');
            $total_positive = $history->whereBetween('day', [1, $stats->day])->where('district_id', $history->district_id)->sum('positive');
            $total_recovered = $history->whereBetween('day', [1, $stats->day])->where('district_id', $history->district_id)->sum('recovered');
            $total_death = $history->whereBetween('day', [1, $stats->day])->where('district_id', $history->district_id)->sum('death');
            $total_negative = $history->whereBetween('day', [1, $stats->day])->where('district_id', $history->district_id)->sum('negative');
            $data[$key][trans('general.name')] = $district->kabupaten;
            $data[$key][trans('general.new_case')] = [
                trans('general.positive') => $history->positive,
                trans('general.recovered') => $history->recovered,
                trans('general.death') => $history->death,
                trans('general.negative') => $history->negative,
                trans('general.ODP') => $history->new_ODP,
                trans('general.PDP') => $history->new_PDP,
            ];
            $data[$key][trans('general.active_case')] = [
                trans('general.under_treatment') => $history->under_treatment,
                trans('general.ODP') => $total_odp - $total_finished_odp,
                trans('general.PDP') => $total_pdp - $total_finished_pdp,
            ];
            $data[$key][trans('general.finished_case')] = [
                trans('general.ODP') => $history->finished_ODP,
                trans('general.PDP') => $history->finished_PDP,
            ];
            $data[$key][trans('general.cumulative')] = [
                trans('general.positive') => (int) $total_positive,
                trans('general.recovered') => (int) $total_recovered,
                trans('general.death') => (int) $total_death,
                trans('general.negative') => (int) $total_negative,
                trans('general.ODP') => (int) $total_odp,
                trans('general.PDP') => (int) $total_pdp,
                trans('general.finished_param', ['case' => 'ODP']) => (int) $total_finished_odp,
                trans('general.finished_param', ['case' => 'PDP']) => (int) $total_finished_pdp,
            ];
            $data[$key][trans('general.links')] =
                [trans('general.self') => [
                    trans('general.full') => route('v2.district.index') . '/' . $history->district_id,
                    trans('general.endpoint') => 'v2/kabupaten/' . $history->district_id,
                ]];
        }
        $gender = Gender::where('day', $stats->day)->get()->first();
        return [
            trans('general.day') => $stats->day,
            trans('general.date') => $stats->date,
            trans('general.new_case') => [
                trans('general.positive') => $stats->positive,
                trans('general.recovered') => $stats->recovered,
                trans('general.death') => $stats->death,
                trans('general.negative') => $stats->negative,
                trans('general.ODP') => $stats->new_ODP,
                trans('general.PDP') => $stats->new_PDP,
            ],
            trans('general.active_case') => [
                trans('general.under_treatment') => $stats->under_treatment,
                trans('general.ODP') => $stats->active_ODP,
                trans('general.PDP') => $stats->active_PDP,
            ],
            trans('general.finished_case') => [
                trans('general.ODP') => $stats->finished_ODP,
                trans('general.PDP') => $stats->finished_PDP,
            ],
            trans('general.cumulative') => [
                trans('general.positive') => $stats->cumulative_positive,
                trans('general.recovered') => $stats->cumulative_recovered,
                trans('general.death') => $stats->cumulative_death,
                trans('general.negative') => $stats->cumulative_negative,
                trans('general.ODP') => $stats->cumulative_ODP,
                trans('general.PDP') => $stats->cumulative_PDP,
                trans('general.finished_param', ['case' => 'ODP']) => $stats->cumulative_finished_ODP,
                trans('general.finished_param', ['case' => 'PDP']) => $stats->cumulative_finished_PDP,
            ],
            trans('general.recap') => [
                trans('general.percentage') => [
                    trans('general.death') => $stats->death_percentage,
                    trans('general.recovered') => $stats->recovered_percentage,
                    trans('general.under_treatment') => $stats->under_treatment_percentage,
                ],
                trans('general.positive') => [
                    trans('general.man') => [
                        'total' => $gender->positive_male,
                        trans('general.age_group') => [
                            '0_14' => $gender->positive_male_0_14,
                            '15_19' => $gender->positive_male_15_19,
                            '20_24' => $gender->positive_male_20_24,
                            '25_49' => $gender->positive_male_25_49,
                            '50_54' => $gender->positive_male_50_54,
                            trans('general.above_55') => $gender->positive_male_55
                        ]
                    ],
                    trans('general.woman') => [
                        'total' => $gender->positive_female,
                        trans('general.age_group') => [
                            '0_14' => $gender->positive_female_0_14,
                            '15_19' => $gender->positive_female_15_19,
                            '20_24' => $gender->positive_female_20_24,
                            '25_49' => $gender->positive_female_25_49,
                            '50_54' => $gender->positive_female_50_54,
                            trans('general.above_55') => $gender->positive_female_55
                        ]
                    ]
                ],
                trans('general.PDP') => [
                    trans('general.man') => [
                        'total' => $gender->pdp_male,
                        trans('general.age_group') => [
                            '0_14' => $gender->pdp_male_0_14,
                            '15_19' => $gender->pdp_male_15_19,
                            '20_24' => $gender->pdp_male_20_24,
                            '25_49' => $gender->pdp_male_25_49,
                            '50_54' => $gender->pdp_male_50_54,
                            trans('general.above_55') => $gender->positive_male_55
                        ]
                    ],
                    trans('general.woman') => [
                        'total' => $gender->pdp_female,
                        trans('general.age_group') => [
                            '0_14' => $gender->pdp_female_0_14,
                            '15_19' => $gender->pdp_female_15_19,
                            '20_24' => $gender->pdp_female_20_24,
                            '25_49' => $gender->pdp_female_25_49,
                            '50_54' => $gender->pdp_female_50_54,
                            trans('general.above_55') => $gender->positive_female_55
                        ]
                    ]
                ],
                trans('general.average') => [
                    trans('general.daily') => [
                        trans('general.positive') => $stats->daily_positive_case,
                        trans('general.recovered') => $stats->daily_recovered_case,
                        trans('general.death') => $stats->daily_death_case,
                        trans('general.ODP') => $stats->daily_ODP_case,
                        trans('general.PDP') => $stats->daily_PDP_case,
                    ],
                    trans('general.weekly') => [
                        trans('general.positive') => $weekly_positive_avg,
                        trans('general.recovered') => $weekly_recovered_avg,
                        trans('general.death') => $weekly_death_avg,
                        trans('general.ODP') => $weekly_ODP_avg,
                        trans('general.PDP') => $weekly_PDP_avg,
                    ],
                ],
            ],
            trans('general.district_list') => $data,
        ];
    }
}
