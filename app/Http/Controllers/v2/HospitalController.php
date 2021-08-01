<?php

namespace App\Http\Controllers\v2;

use App\Services\HospitalService;
use App\Http\Controllers\Controller;

class HospitalController extends Controller
{

    public function index()
    {
        $hospitals = (new HospitalService)->all(72);
        if ($hospitals) {
            return $this->response($hospitals);
        } else {
            return $this->responseNotFound('Data rumah sakit tidak ditemukan!');
        }
    }

    public function show($code)
    {
        $hospital = (new HospitalService)->show($code);
        if ($hospital != null) {
            return $this->response($hospital);
        } else {
            return $this->responseNotFound('Rumah sakit dengan kode ' . $code . ' tidak ditemukan.');;
        }
    }
}
