<?php

namespace App\Http\Controllers;

use App\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{

    public function __construct()
    {
        $this->middleware('throttle:1,2');
    }

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
        if ($request->has('API_KEY')) {
            $API_KEY = $request->get('API_KEY');
            if ($API_KEY == 'API_KEY') {
                $province = Provinsi::where("kode_provinsi", $code)->first();
                if ($province === null) {
                    return response($this->setJson([], false, ['code' => 404, 'message' => 'Province Not Found!']));
                } else {
                    $update = Provinsi::where("kode_provinsi", $code)->update(
                        [
                            'meninggal' => $request->get("meninggal"),
                            'sembuh' => $request->get("sembuh"),
                            'positif' => $request->get('positif')
                        ]
                    );
                    if ($update) {
                        return response($this->setJson("Data Updated Successfully!", true, []), 201)
                            ->header("Content-Type", "application/json");
                    } else {
                        return response($this->setJson([], false, [
                            'code' => 400,
                            'message' => 'Failed to update!'
                        ]))
                            ->header("Content-Type", 'Application/json');
                    }
                }
            } else {
                return response($this->setJson([], false, [
                    'code' => 401,
                    'message' => 'Invalid API Key, Unauthorized Acess!'
                ]), 401);
            }
        } else {
            return response($this->setJson([], false, [
                'code' => 401,
                'message' => 'Unauthorized Acess!'
            ]), 401);
        }
    }

    private function setJson($data, $succes, $errors)
    {
        return [
            'success' => $succes,
            'errors' => $errors,
            'data' => $data
        ];
    }
}
