<?php

namespace App\Http\Controllers\v2;

use App\District;
use App\Http\Controllers\Controller;
use App\Transformers\PostsTransformer;
use Illuminate\Http\Request;
use JsonFormat;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

class PostsController extends Controller
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
            app('translator')->setLocale($request->input('lang'));
        }
        if (District::all()->count() > 0) {
            $districts = District::all();
            $resource = new Collection($districts, new PostsTransformer());

            $data = $this->fractal->createData($resource)->toArray();

            return response(array_replace(JsonFormat::setJson([], true, []), $data), 200)
                ->header('Content-Type', 'application/json');
        } else {
            return response(JsonFormat::setJson(['Posts data is still empty!'], true, []), 200);
        }
    }
}
