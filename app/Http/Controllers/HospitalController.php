<?php

namespace App\Http\Controllers;

use App\Hospital;
use App\Transformers\HospitalTransformer;
use JsonFormat;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class HospitalController extends Controller
{
    private $fractal;

    public function __construct()
    {
        $this->middleware('throttle:20,2');
        $this->fractal = new Manager();
        app('translator')->setLocale('id');
    }

    public function index()
    {
        if (Hospital::all()->count() > 0) {
            $resource = new Collection(Hospital::all(), new HospitalTransformer());
            $data = $this->fractal->createData($resource)->toArray();

            return response(
                array_replace(JsonFormat::setJson([], true, []), $data),
                200
            )
                ->header('Content-Type', 'Application/json');
        } else {
            return response(JsonFormat::setJson(['Hospital data is still empty!'], true, []), 200);
        }
    }

    public function show($no)
    {
        $hospital = Hospital::where('no', $no)->first();
        if ($hospital === null) {
            return response(
                JsonFormat::setJson($hospital, true, ['code' => 404, 'message' => 'Hospital not found!']),
                404
            );
        } else {
            $resource = new Item($hospital, new HospitalTransformer());
            $data = $this->fractal->createData($resource)->toArray();

            return response(
                array_replace(JsonFormat::setJson([], true, []), $data),
                200
            )
                ->header('Content-Type', 'Application/json');
        }
    }
}
