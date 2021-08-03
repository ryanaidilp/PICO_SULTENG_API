<?php

namespace App\Services;

use App\Models\Hospital;
use App\Transformers\Serializers\AppSerializer;
use App\Transformers\Api\v1\HospitalTransformer;

class HospitalService
{
    public function all($province_id)
    {
        $hospitals = Hospital::where("regency_id", "LIKE", "$province_id%")
            ->with(["contacts", "beds", "contacts.contact_type"])
            ->withCount(["beds as igd_count" => function ($query) {
                $query->select("available")->where("hospital_bed_type_id", 1);
            }])
            ->get();
        return $this->format($hospitals);
    }

    public function show($hospital_code)
    {
        $hospital = Hospital::where('hospital_code', $hospital_code)->with([
            "contacts", "contacts.contact_type", "beds"
        ])->withCount(["beds as igd_count" => function ($query) {
            $query->select("available")->where("hospital_bed_type_id", 1);
        }])->first();
        return $this->format($hospital);
    }

    private function format($data)
    {
        $transformer = new HospitalTransformer();
        $transformer->setDefaultIncludes([__('general.contacts'), __('general.beds')]);
        return fractal($data, $transformer, new AppSerializer)->toArray();
    }
}
