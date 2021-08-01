<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use App\Services\NationalCaseService;

class NationalCaseController extends Controller
{

    public function index()
    {
        $cases = (new NationalCaseService)->all();
        if ($cases) {
            return $this->response($cases);
        } else {
            return $this->responseNotFound('Tidak ada data statistik nasional!');
        }
    }

    public function show($day)
    {
        $case = (new NationalCaseService)->byDay($day);
        if ($case) {
            return $this->response($case);
        } else {
            return $this->responseNotFound('Tidak ada data statistik nasional untuk hari ke ' . $day);
        }
    }
}
