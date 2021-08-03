<?php

namespace App\Services;

use App\Models\RegencyCase;
use App\Models\NationalCase;
use App\Transformers\Serializers\AppSerializer;
use App\Transformers\Api\v2\RegencyCaseTransformer;

class RegencyCaseService
{
    public function latestRegencies($province_id)
    {
        $case = NationalCase::with([
            "regency_cases" => function ($query) use ($province_id) {
                return $query->with("regency:id,name")
                    ->where([
                        ["regency_id", "LIKE", "$province_id%"],
                    ])->where(function ($q) {
                        return $q->where("positive", ">", 0)
                            ->orWhere("recovered", ">", 0)
                            ->orWhere("deceased", ">", 0);
                    });
            },
            "regency_cases.national_case:id,date",
            "regency_cases.regency:id,name"
        ])->latest("day")->first();
        $cases = $case->regency_cases;
        return $this->format($cases);
    }

    public function show($regency_id)
    {
        $regency = RegencyCase::with(['regency:id,name', 'national_case:id,date'])
            ->where('regency_id', $regency_id)
            ->get();

        return $this->format($regency);
    }


    private function format($data)
    {
        return fractal($data, new RegencyCaseTransformer, new AppSerializer)->toArray();
    }
}
