<?php

namespace App\Services;

use App\Models\Province;
use App\Transformers\Serializers\AppSerializer;

class ProvinceService
{
    private $transformer;
    private $includeSuspect;

    public function __construct($transformer, $includeSuspect = false)
    {
        $this->transformer = $transformer;
        $this->includeSuspect = $includeSuspect;
    }

    public function all($relations = ['case'])
    {
        $provinces = Province::with($relations)->get();
        return $this->format($provinces);
    }

    public function getById($province_id, $relations = ['case'])
    {
        $province = Province::with($relations)->where('id', $province_id)->first();
        return $this->format($province);
    }

    private function format($data)
    {
        return \fractal($data, new $this->transformer($this->includeSuspect), new AppSerializer)->toArray();
    }
}
