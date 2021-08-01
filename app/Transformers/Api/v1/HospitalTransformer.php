<?php

namespace App\Transformers\Api\v1;

use App\Models\Hospital;
use League\Fractal\TransformerAbstract;
use App\Transformers\ContactTransformer;

class HospitalTransformer extends TransformerAbstract
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
    public function transform(Hospital $hospital)
    {
        return [
            trans('general.no') => $hospital->hospital_code,
            trans('general.name') => $hospital->name,
            trans('general.longitude') => $hospital->longitude,
            trans('general.latitude') => $hospital->latitude,
            trans('general.igd_count') => $hospital->igd_count ?? 0,
            trans('general.updated_at') => \optional($hospital->beds->first())->updated_at,
        ];
    }

    public function includeContacts(Hospital $hospital)
    {
        return $this->collection($hospital->contacts, new ContactTransformer);
    }

    public function includeKontak(Hospital $hospital)
    {
        return $this->collection($hospital->contacts, new ContactTransformer);
    }

    public function  includeBeds(Hospital $hospital)
    {
        return $this->collection($hospital->beds, new HospitalBedTransformer);
    }

    public function  includeTempatTidur(Hospital $hospital)
    {
        return $this->collection($hospital->beds, new HospitalBedTransformer);
    }
}
