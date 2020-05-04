<?php

namespace App\Http\Controllers;

use App\Stats;
use Carbon\Carbon;
use Illuminate\Http\Request;
use JsonFormat;

class StatController extends Controller
{

    public function __construct()
    {
        $this->middleware('throttle:20,2');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return (Stats::all()->count() > 0) ?
            JsonFormat::setJson(Stats::all(), true, [])
            :
            JsonFormat::setJson(['message' => "Data is empty!"], true, []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('API_KEY')) {
            $API_KEY = $request->get('API_KEY');
            if ($API_KEY == 'API_KEY') {
                $data = $this->validate($request, [
                    'day' => 'required|unique:stats',
                    'date' => 'required|unique:stats',
                    'positive' => 'required',
                    'cumulative_positive' => '',
                    'recovered' => 'required',
                    'cumulative_recovered' => '',
                    'death' => 'required',
                    'cumulative_death' => '',
                    'updated_at' => Carbon::now(),
                    'created_at' => Carbon::now()
                ]);
                Stats::create($data);
                return (Stats::first()->count() > 0) ?
                    response(JsonFormat::setJson(['status' => 201, 'message' => 'Data created successfully!'], true, []), 201)
                    :
                    response(JsonFormat::setJson([], false, ['code' => 400, 'message' => 'Failed to create data!']));
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Stats  $stats
     * @return \Illuminate\Http\Response
     */
    public function show($day)
    {
        $stat = Stats::where('day', $day)->first();
        if ($stat === null) {
            return response(JsonFormat::setJson([], false, ['code' => 404, 'message' => 'Stats not found!']), 404);
        } else {
            return response(JsonFormat::setJson($stat, true, []), 200);
        }
    }

    public function update(Request $request, $day)
    {
        if ($request->has('API_KEY')) {
            $API_KEY = $request->get('API_KEY');
            if ($API_KEY == 'API_KEY') {
                $Stats = Stats::where("day", $day)->first();
                if ($Stats === null) {
                    return response(JsonFormat::setJson([], false, ['code' => 404, 'message' => 'Stats Not Found!']), 404);
                } else {
                    $update = Stats::where("id", $day)->update(
                        [
                            'positive' => $request->get("positive"),
                            'cumulative_positive' => $request->get("cumulative_positive"),
                            'recovered' => $request->get("recovered"),
                            'cumulative_recovered' => $request->get("cumulative_recovered"),
                            'death' => $request->get('death'),
                            'cumulative_death' => $request->get('cumulative_death')
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
}
