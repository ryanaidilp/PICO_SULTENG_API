<?php

namespace App\Services;

use App\Models\RegencyCase;
use App\Models\NationalCase;
use App\Transformers\Serializers\AppSerializer;

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


    private function format($data)
    {
        return fractal($data, new RegencyCaseTransformer, new AppSerializer)->toArray();
    }
}
