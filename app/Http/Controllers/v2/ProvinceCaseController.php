<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use App\Services\ProvinceCaseService;

class ProvinceCaseController extends Controller
{

    public function index()
    {
        $cases = (new ProvinceCaseService('v2'))->all(72);
        if ($cases) {
            return $this->response($cases);
        } else {
            return $this->responseNotFound('Tidak ada data statistik provinsi.');
        }
    }

    public function show($day)
    {
        $case = (new ProvinceCaseService('v2'))->byDay(72, $day);

        if ($case) {
            return $this->response($case);
        } else {
            return $this->responseNotFound('Tidak ada data statistik provinsi.');
        }
    }
}
