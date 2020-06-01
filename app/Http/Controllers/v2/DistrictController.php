<?php

namespace App\Http\Controllers\v2;

use App\District;
use App\Http\Controllers\Controller;
use App\Transformers\DistrictTransformer;
use Illuminate\Http\Request;
use JsonFormat;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class DistrictController extends Controller
{
    private $fractal;

    public function __construct()
    {
        $this->middleware('throttle:20,2');
        $this->fractal = new Manager();
        app('translator')->setLocale('id');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('lang')) {
            app('translator')->setLocale($request->input('lang'));
        }
        $districts = District::all();
        $resources = new Collection($districts, new DistrictTransformer());
        $data = $this->fractal->createData($resources)->toArray();

        return response(array_replace(JsonFormat::setJson([], true, []), $data), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\District $district
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $no)
    {
        if ($request->has('lang')) {
            app('translator')->setLocale($request->input('lang'));
        }
        $district = District::where('no', $no)->first();
        $resources = new Item($district, new DistrictTransformer());
        $data = $this->fractal->createData($resources)->toArray();

        return response(array_replace(JsonFormat::setJson([], true, []), $data), 200);
    }
}
