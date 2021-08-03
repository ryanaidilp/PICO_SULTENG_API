<?php

namespace App\Transformers\Api\v1;

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
                trans('general.day') => $case->day,
                trans('general.date') => $case->national_case->date,
                trans('general.positive') => $case->positive,
                trans('general.recovered') => $case->recovered,
                trans('general.death') => $case->deceased,
                trans('general.cumulative_param', ['case' => trans('general.positive')]) => $case->cumulative_positive,
                trans('general.cumulative_param', ['case' => trans('general.recovered')]) => $case->cumulative_recovered,
                trans('general.cumulative_param', ['case' => trans('general.death')]) => $case->cumulative_deceased,
                trans('general.percentage_param', ['case' => trans('general.under_treatment')]) => $case->under_treatment_percentage,
                trans('general.percentage_param', ['case' => trans('general.recovered')]) => $case->recovered_percentage,
                trans('general.percentage_param', ['case' => trans('general.death')]) => $case->death_ratio,

            ];
    }
}
