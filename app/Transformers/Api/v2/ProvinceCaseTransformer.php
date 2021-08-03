<?php

namespace App\Transformers\Api\v2;

use App\Models\ProvinceCase;
use League\Fractal\TransformerAbstract;

class ProvinceCaseTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(ProvinceCase $case)
    {
        return
            [
                trans("general.day") => $case->day,
                trans("general.date") => $case->national_case->date,
                trans("general.new_case") => [
                    trans("general.positive") => $case->positive,
                    trans("general.recovered") => $case->recovered,
                    trans("general.death") =>  $case->deceased,
                    trans("general.under_treatment") => $case->under_treatment,
                ],
                trans("general.cumulative") => [
                    trans("general.positive") => $case->cumulative_positive,
                    trans("general.recovered") => $case->cumulative_recovered,
                    trans("general.death") =>  $case->cumulative_deceased,
                    trans("general.under_treatment") => $case->cumulative_under_treatment,
                ],
                trans('general.recap') => [
                    trans('general.percentage') => [
                        trans('general.under_treatment') => $case->under_treatment_percentage,
                        trans('general.death') => $case->death_ratio,
                        trans('general.recovered') => $case->recovered_percentage
                    ],
                    trans('general.infection_rate') => [
                        'rt' => $case->rt,
                        'rt_upper' => $case->rt_upper,
                        'rt_lower' => $case->rt_lower
                    ]
                ]
            ];
    }
}
