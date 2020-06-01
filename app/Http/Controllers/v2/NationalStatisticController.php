<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use App\NationalCaseHistory;
use App\Transformers\v2\NationalStatisticTransformer;
use Illuminate\Http\Request;
use JsonFormat;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class NationalStatisticController extends Controller
{
    private $fractal;

    public function __construct()
    {
        $this->middleware('throttle:20,2');
        $this->fractal = new Manager();
        app('translator')->setLocale('id');
    }

    public function index(Request $request)
    {
        if ($request->has('lang')) {
            app('translator')->setLocale($request->get('lang'));
        }
        $nationals = NationalCaseHistory::all();
        $resource = new Collection($nationals, new NationalStatisticTransformer());
        $data = $this->fractal->createData($resource)->toArray();

        return response(array_replace(JsonFormat::setJson([], true, []), $data), 200);
    }

    public function show($day, Request $request)
    {
        if ($request->has('lang')) {
            app('translator')->setLocale($request->get('lang'));
        }
        $national = NationalCaseHistory::where('day', $day)->first();
        if ($national === null) {
            return response(JsonFormat::setJson([], false, ['code' => 404, 'message' => 'Data not found!']), 404);
        } else {
            $resource = new Item($national, new NationalStatisticTransformer());
            $data = $this->fractal->createData($resource)->toArray();

            return response(array_replace(JsonFormat::setJson([], true, []), $data), 200);
        }
    }
}
