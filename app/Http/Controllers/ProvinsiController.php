<?php

namespace App\Http\Controllers;

use App\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    public function index()
    {
        return response($this->setJson(Provinsi::all(), true, []), 200)
            ->header("Content-Type", "application/json");
    }

    public function get($code)
    {
        $province = Provinsi::where("kode_provinsi", $code)->first();
        if ($province != null) {
            return response($this->setJson($province, true, []), 200)
                ->header("Content-Type", "application/json");
        } else {
            return response($this->setJson([], false, ['code' => 404, 'message' => 'Province Not Found!']))
                ->header("Content-Type", "application/json");
        }
    }

    public function update($code, Request $request)
    {
        $province = Provinsi::where("kode_provinsi", $code)->first();
        if ($province === null) {
            return response($this->setJson([], false, ['code' => 404, 'message' => 'Province Not Found!']));
        } else {
            $province->update([
                'meninggal' => $request->get("meninggal"),
                'sembuh' => $request->get("sembuh"),
                'positif' => $request->get('positif')
            ]);
        }
    }

    private function setJson($data, $succes, $errors)
    {
        return [
            'data' => $data,
            'success' => $succes,
            'errors' => $errors
        ];
    }
}
