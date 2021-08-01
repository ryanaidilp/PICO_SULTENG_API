<?php

namespace App\Http\Controllers\v1;


use App\Services\RegencyService;
use App\Http\Controllers\Controller;

class RegencyController extends Controller
{
    public function index()
    {
        $regencies = (new RegencyService)->all(72);
        if ($regencies) {
            return $this->response($regencies);
        } else {
            return $this->responseNotFound('Tidak ada data kabupaten.');
        }
    }

    public function show($code)
    {
        $regency = (new RegencyService)->show($code);
        if ($regency) {
            return $this->response($regency);
        } else {
            return $this->responseNotFound('Kabupaten dengan kode ' . $code . ' tidak ditemukan.');
        }
    }
}
