<?php

namespace App\Services;

use App\Models\ProvinceCase;
use App\Transformers\Serializers\AppSerializer;
use App\Transformers\Api\v1\ProvinceCaseTransformer;
use App\Transformers\Api\v2\ProvinceCaseTransformer as V2ProvinceCaseTransformer;

class ProvinceCaseService
{
    private $version;

    public function __construct($version = 'v1')
    {
        $this->version = $version;
    }

    public function all($province_id)
    {
        $cases = ProvinceCase::with([
            "national_case:id,date"
        ])
            ->where("province_id", $province_id)->get();
        return $this->format($cases);
    }

    public function latest($province_id)
    {
        $data = ProvinceCase::with(["national_case:id,date"])
            ->where("province_id", $province_id)
            ->latest("day")->first();
        return $this->format($data);
    }

    public function byDay($province_id, $day)
    {
        $data = ProvinceCase::with(["national_case:id,date"])
            ->where([
                ["province_id", "=", $province_id],
                ["day", "=", $day]
            ])->first();
        return $this->format($data);
    }

    private function format($data)
    {
        $transformer = new ProvinceCaseTransformer;
        if ($this->version == 'v2') {
            $transformer = new V2ProvinceCaseTransformer;
        }
        return \fractal($data, $transformer, new AppSerializer)->toArray();
    }
}
