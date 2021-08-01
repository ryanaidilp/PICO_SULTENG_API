<?php

namespace App\Transformers\Api\v1;

use App\Models\Province;
use League\Fractal\TransformerAbstract;

class ProvinceTransformer extends TransformerAbstract
{
    protected $includeSuspect;

    public function __construct($includeSuspect = false)
    {
        $this->includeSuspect = $includeSuspect;
    }
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
    public function transform(Province $province)
    {
        $case = $province->case;
        $data = [
            trans('general.province_code') => $province->id,
            'updated_at' => $case->updated_at,
            trans('general.province') => $province->name,
            trans('general.positive') => $case->cumulative_positive,
            trans('general.under_treatment') => $case->cumulative_under_treatment,
            trans('general.death') => $case->cumulative_deceased,
            trans('general.recovered') => $case->cumulative_recovered,
            trans('general.death_rate') => $case->death_ratio,
            trans('general.map_id') => $province->map_id,
        ];

        if ($this->includeSuspect) {
            $data += [
                trans('general.ODP') => $case->cumulative_person_under_observation,
                trans('general.finished_param', ['case' => trans('general.observation')]) => $case->cumulative_finished_person_under_observation,
                trans('general.active_param', ['case' => trans('general.observation')]) => $case->active_person_under_observation,
                trans('general.PDP') => $case->cumulative_person_under_supervision,
                trans('general.finished_param', ['case' => trans('general.supervision')]) => $case->cumulative_finished_person_under_supervision,
                trans('general.active_param', ['case' => trans('general.supervision')]) => $case->active_person_under_supervision,
            ];
        }

        return
            $data;
    }
}
