<?php

namespace App\Http\Controllers\v2;


use App\Services\RegencyService;
use App\Services\RegencyCaseService;
use App\Http\Controllers\Controller;

class RegencyController extends Controller
{
    public function index()
    {
        $regencies = (new RegencyService)->all(72);

        if ($regencies) {
            return $this->response($regencies);
        }

        return $this->responseNotFound('Tidak ada data kabupaten.');
    }

    public function show($code)
    {
        $regency = (new RegencyService)->show($code);

        if ($regency) {
            return $this->response($regency);
        }

        return $this->responseNotFound('Kabupaten dengan kode ' . $code . ' tidak ditemukan.');
    }

    public function daily($code)
    {
        if (!$code) {
            return $this->responseInvalid('Kode kabupaten/kota wajib diisi!');
        }

        $regency = (new RegencyCaseService)->show($code);

        if ($regency) {
            return $this->response($regency);
        }

        return $this->responseNotFound('Tidak ditemukan data untuk kabupaten/kota dengan kode ' . $code);
    }
}
