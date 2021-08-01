<?php

namespace App\Transformers\Api\v1;

use App\Models\HospitalBed;
use League\Fractal\TransformerAbstract;

class HospitalBedTransformer extends TransformerAbstract
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
    public function transform(HospitalBed $bed)
    {
        return [
            __('general.bed_type') => $bed->bed_type->name,
            __('general.total') => $bed->total,
            __('general.available') => $bed->available,
            __('general.occupied') => $bed->occupied,
            __('general.queue') => $bed->queue,
            __('general.updated_at') => $bed->updated_at
        ];
    }
}
