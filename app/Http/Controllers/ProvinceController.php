<?php

namespace App\Http\Controllers;

use App\Province;
use App\Transformers\ProvinceTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use JsonFormat;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class ProvinceController extends Controller
{
    private $fractal;

    public function __construct()
    {
        $this->middleware('throttle:40,2');
        $this->fractal = new Manager();
        app('translator')->setLocale('id');
    }

    public function index()
    {
        $provinces = Province::all();
        $resource = new Collection($provinces, new ProvinceTransformer());
        $data = $this->fractal->createData($resource)->toArray();

        return response(array_replace(JsonFormat::setJson([], true, []), $data), 200);
    }

    public function show($code)
    {
        $province = Province::where('kode_provinsi', $code)->first();
        if ($province != null) {
            $province = new Item($province, new ProvinceTransformer());
            $data = $this->fractal->createData($province)->toArray();

            return response(array_replace(JsonFormat::setJson([], true, []), $data), 200)
                ->header('Content-Type', 'application/json');
        } else {
            return response(JsonFormat::setJson([], false, ['code' => 404, 'message' => 'Province Not Found!']), 404)
                ->header('Content-Type', 'application/json');
        }
    }

    public function updateAll(Request $request)
    {
        if ($request->has('API_KEY')) {
            $API_KEY = $request->get('API_KEY');
            if ($API_KEY == 'API_KEY') {
                $response = Http::get('https://api.kawalcorona.com/indonesia/provinsi');
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
                                'meninggal' => $meninggal,
                            ]);
                    }

                    return response(JsonFormat::setJson(['Successfully updated all province data!'], true, []), 200);
                } else {
                    return response(JsonFormat::setJson([], false, [
                        'code' => 400,
                        'message' => 'Failed to update province!',
                    ]), 400);
                }
            } else {
                return response(JsonFormat::setJson([], false, [
                    'code' => 401,
                    'message' => 'Invalid API Key, Unauthorized Access!',
                ]), 401);
            }
        } else {
            return response(JsonFormat::setJson([], false, [
                'code' => 401,
                'message' => 'Unauthorized Access!',
            ]), 401);
        }
    }
}
