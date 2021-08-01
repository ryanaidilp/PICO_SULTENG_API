<?php

namespace App\Http\Controllers\v1;

use App\Services\ProvinceService;
use App\Http\Controllers\Controller;
use App\Transformers\Api\v1\ProvinceTransformer;

class ProvinceController extends Controller
{

    public function index()
    {
        $provinces = (new ProvinceService(ProvinceTransformer::class))->all();

        return $this->response($provinces);
    }

    public function show($code)
    {
        $province = (new ProvinceService(ProvinceTransformer::class))->getById($code);
        if ($province != null) {
            return $this->response($province);
        } else {
            return $this->responseNotFound('Provinsi dengan kode ' . $code . ' tidak ditemukan.');;
        }
    }
}
