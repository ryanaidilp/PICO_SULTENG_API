<?php

namespace App\Http\Controllers;

use App\District;
use Illuminate\Http\Request;
use JsonFormat;

class DistrictController extends Controller
{
    public function __construct()
    {
        $this->middleware('throttle:1,2');
    }

    public function show($no)
    {
        $district = District::where('no', $no)->first();
        if ($district === null) {
            return response(JsonFormat::setJson([], false, [
                'code' => 404,
                'message' => 'District not found!',
            ]), 404);
        } else {
            $response = response(JsonFormat::setJson($district, true, []), 200)
                ->header('Content-Type', 'Application/json');
        }

        return $response;
    }

    public function index()
    {
        if (District::all()->count() > 0) {
            return response(JsonFormat::setJson(District::all(), true, []), 200)
                ->header('Content-Type', 'application/json');
        } else {
            return response(JsonFormat::setJson(['District data is still empty!'], true, []), 200);
        }
    }

    public function update($no, Request $request)
    {
        if ($request->has('API_KEY')) {
            $API_KEY = $request->get('API_KEY');
            if ($API_KEY == 'API_KEY') {
                $update = District::where('no', $no)->update(
                    [
                        'ODP' => $request->get('ODP'),
                        'PDP' => $request->get('PDP'),
                        'positif' => $request->get('positif'),
                        'sembuh' => $request->get('sembuh'),
                        'negatif' => $request->get('negatif'),
                        'selesai_pengawasan' => $request->get('selesai_pengawasan'),
                        'selesai_pemantauan' => $request->get('selesai_pemantauan'),
                        'meninggal' => $request->get('meninggal'),
                    ]
                );
                if ($update) {
                    return
                        response(JsonFormat::setJson('Data Updated Successfully!', true, []), 200)
                        ->header('Content-Type', 'application/json');
                } else {
                    return
                        response(JsonFormat::setJson(
                            [],
                            false,
                            [
                                'code' => 400,
                                'message' => 'Failed to update!',
                            ]
                        ), 400)->header('Content-Type', 'Application/json');
                }
            } else {
                return
                    response(JsonFormat::setJson(
                        [],
                        false,
                        [
                            'code' => 401,
                            'message' => 'Invalid API Key, Unauthorized Access!',
                        ]
                    ), 401);
            }
        } else {
            return
                response(JsonFormat::setJson([], false, [
                    'code' => 401,
                    'message' => 'Unauthorized Access!',
                ]), 401);
        }
    }
}
