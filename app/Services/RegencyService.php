<?php

namespace App\Services;

use App\Models\Regency;
use App\Transformers\Api\v1\RegencyTransformer;
use App\Transformers\Serializers\AppSerializer;

class RegencyService
{
    public function all($province_id)
    {
        $regencies = Regency::where("province_id", "=", $province_id)
            ->with("case")
            ->get();
        return $this->format($regencies);
    }

    public function show($regency_id)
    {
        $regencies = Regency::where("id", "=", $regency_id)
            ->with("case")
            ->first();
        return $this->format($regencies);
    }


    public function allWithDaily($province_id)
    {
        $regencies = Regency::with("cases", "cases.national_case:id,date", "cases.regency:id,name")
            ->where("province_id", $province_id)->get();
        return $this->format($regencies);
    }

    private function format($data, $transformer = null)
    {
        if ($transformer == null) {
            $transformer = new RegencyTransformer;
        }
        return fractal($data,  $transformer, new AppSerializer)->toArray();
    }
}
