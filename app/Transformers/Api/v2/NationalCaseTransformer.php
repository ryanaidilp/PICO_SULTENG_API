<?php

namespace App\Transformers\Api\v2;

use App\Models\NationalCase;
use League\Fractal\TransformerAbstract;

class NationalCaseTransformer extends TransformerAbstract
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
    public function transform(NationalCase $case)
    {
        return [
            trans("general.day") => $case->day,
            trans("general.date") => $case->date,
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

            ]
        ];
    }
}
