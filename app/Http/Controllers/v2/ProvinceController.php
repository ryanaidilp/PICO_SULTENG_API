<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use App\Province;
use App\Transformers\ProvinceTransformer;
use Illuminate\Http\Request;
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

    public function index(Request $request)
    {
        if ($request->has('lang')) {
            app('translator')->setLocale($request->input('lang'));
        }
        $provinces = Province::all();
        $resource = new Collection($provinces, new ProvinceTransformer());
        $data = $this->fractal->createData($resource)->toArray();

        return response(array_replace(JsonFormat::setJson([], true, []), $data), 200);
    }

    public function show($code, Request $request)
    {
        if ($request->has('lang')) {
            app('translator')->setLocale($request->input('lang'));
        }
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
}
