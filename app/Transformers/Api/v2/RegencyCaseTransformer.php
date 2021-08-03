<?php

namespace App\Transformers\Api\v2;

use App\Models\RegencyCase;
use League\Fractal\TransformerAbstract;

class RegencyCaseTransformer extends TransformerAbstract
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
    public function transform(RegencyCase $case)
    {
        return
            [
                __('general.day') => $case->day,
                __('general.district') => $case->regency->name,
                __('general.date') => $case->national_case->date,
                __('general.new_case') => [
                    __('general.positive') => $case->positive,
                    __('general.recovered') => $case->recovered,
                    __('general.death') =>  $case->deceased,
                    __('general.under_treatment') => $case->under_treatment,
                ],
                __('general.cumulative') => [
                    __('general.positive') => $case->cumulative_positive,
                    __('general.recovered') => $case->cumulative_recovered,
                    __('general.death') =>  $case->cumulative_deceased,
                    __('general.under_treatment') => $case->cumulative_under_treatment,
                ],
                __('general.recap') => [
                    __('general.percentage') => [
                        __('general.under_treatment') => $case->under_treatment_percentage,
                        __('general.death') => $case->death_ratio,
                        __('general.recovered') => $case->recovered_percentage
                    ],
                    __('general.infection_rate') => [
                        'rt' => $case->rt,
                        'rt_upper' => $case->rt_upper,
                        'rt_lower' => $case->rt_lower
                    ]
                ]
            ];
    }
}
