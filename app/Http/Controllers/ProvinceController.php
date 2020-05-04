<?php

namespace App\Http\Controllers;

use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use JsonFormat;

class ProvinceController extends Controller
{

    public function __construct()
    {
        $this->middleware('throttle:40,2');
    }

    public function index()
    {
        if (Province::all()->count() > 0) {
            return response(JsonFormat::setJson(Province::all(), true, []), 200)
                ->header("Content-Type", "application/json");
        } else {
            return response(JsonFormat::setJson(['Province data is still empty!'], true, []), 200);
        }
    }

    public function show($code)
    {
        $province = Province::where("kode_provinsi", $code)->first();
        if ($province != null) {
            return response(JsonFormat::setJson($province, true, []), 200)
                ->header("Content-Type", "application/json");
        } else {
            return response(JsonFormat::setJson([], false, ['code' => 404, 'message' => 'Province Not Found!']), 404)
                ->header("Content-Type", "application/json");
        }
    }

    public function update($code, Request $request)
    {
        if ($request->has('API_KEY')) {
            $API_KEY = $request->get('API_KEY');
            if ($API_KEY == 'API_KEY') {
                $province = Province::where("kode_provinsi", $code)->first();
                if ($province === null) {
                    return response(JsonFormat::setJson([], false, ['code' => 404, 'message' => 'Province Not Found!']), 404);
                } else {
                    $update = Province::where("kode_provinsi", $code)->update(
                        [
                            'meninggal' => $request->get("meninggal"),
                            'sembuh' => $request->get("sembuh"),
                            'positif' => $request->get('positif')
                        ]
                    );
                    if ($update) {
                        return response(JsonFormat::setJson("Data Updated Successfully!", true, []), 200)
                            ->header("Content-Type", "application/json");
                    } else {
                        return response(JsonFormat::setJson([], false, [
                            'code' => 400,
                            'message' => 'Failed to update!'
                        ]), 400)
                            ->header("Content-Type", 'Application/json');
                    }
                }
            } else {
                return response(JsonFormat::setJson([], false, [
                    'code' => 401,
                    'message' => 'Invalid API Key, Unauthorized Access!'
                ]), 401);
            }
        } else {
            return response(JsonFormat::setJson([], false, [
                'code' => 401,
                'message' => 'Unauthorized Access!'
            ]), 401);
        }
    }

    public function updateAll(Request $request)
    {
        if ($request->has('API_KEY')) {
            $API_KEY = $request->get('API_KEY');
            if ($API_KEY == 'API_KEY') {
                $response = Http::get("https://api.kawalcorona.com/indonesia/provinsi");
                if ($response->successful()) {
                    $arrayProvince = $response->json();
                    foreach ($arrayProvince as $prov) {
                        $positif = $prov['attributes']['Kasus_Posi'];
                        $sembuh = $prov['attributes']['Kasus_Semb'];
                        $meninggal = $prov['attributes']['Kasus_Meni'];
                        Province::where('kode_provinsi', $prov['attributes']['Kode_Provi'])
                            ->update([
                                'positif' => $positif,
                                'sembuh' => $sembuh,
                                'meninggal' => $meninggal

                            ]);
                    }
                    return response(JsonFormat::setJson(["Successfully updated all province data!"], true, []), 200);
                } else {
                    return response(JsonFormat::setJson([], false, [
                        'code' => 400,
                        'message' => 'Failed to update province!'
                    ]), 400);
                }
            } else {
                return response(JsonFormat::setJson([], false, [
                    'code' => 401,
                    'message' => 'Invalid API Key, Unauthorized Access!'
                ]), 401);
            }
        } else {
            return response(JsonFormat::setJson([], false, [
                'code' => 401,
                'message' => 'Unauthorized Access!'
            ]), 401);
        }
    }
}
