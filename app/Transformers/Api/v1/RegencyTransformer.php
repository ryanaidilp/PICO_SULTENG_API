<?php

namespace App\Transformers\Api\v1;

use App\Models\Regency;
use League\Fractal\TransformerAbstract;

class RegencyTransformer extends TransformerAbstract
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
    public function transform(Regency $regency)
    {
        $case = $regency->case;
        return
            [
                trans('general.no') => $regency->id,
                trans('general.district') => $regency->name,
                trans('general.updated_at') => $case->updated_at,
                trans('general.positive') => $case->cumulative_positive,
                trans('general.recovered') => $case->cumulative_recovered,
                trans('general.death') => $case->cumulative_deceased,
                trans('general.ODP') => $case->cumulative_person_under_observation,
                trans('general.finished_param', ['case' => trans('general.observation')]) => $case->cumulative_finished_person_under_observation,
                trans('general.active_param', ['case' => trans('general.observation')]) => $case->active_person_under_observation,
                trans('general.PDP') => $case->cumulative_person_under_supervision,
                trans('general.finished_param', ['case' => trans('general.supervision')]) => $case->cumulative_finished_person_under_supervision,
                trans('general.active_param', ['case' => trans('general.supervision')]) => $case->active_person_under_supervision,
                trans('general.death_rate') => $case->death_ratio,
            ];
    }
}
