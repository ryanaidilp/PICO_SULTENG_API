<?php

namespace App\Services;

use App\Models\NationalCase;
use App\Transformers\Serializers\AppSerializer;
use App\Transformers\Api\v2\NationalCaseTransformer;


class NationalCaseService
{
    public function all()
    {
        $cases = NationalCase::all();
        return $this->format($cases);
    }

    public function byDay($day)
    {
        return $this->format(NationalCase::where("day", $day)->first());
    }

    public function latest()
    {
        return $this->format(NationalCase::latest("day")->first());
    }

    private function format($data)
    {
        return fractal($data, new NationalCaseTransformer, new AppSerializer)->toArray();
    }
}
