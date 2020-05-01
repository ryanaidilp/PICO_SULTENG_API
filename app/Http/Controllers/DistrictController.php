<?php

namespace App\Http\Controllers;

use App\District;
use Illuminate\Http\Request;

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
            return response($this->setJson([], false, [
                'code' => 404,
                'message' => 'District not found!',
            ]), 404);
        } else {
            $response = response($this->setJson($district, true, []), 200)
                ->header('Content-Type', 'Application/json');
        }

        return $response;
    }

    public function index()
    {
        return response($this->setJson(District::all(), true, []), 200)
            ->header('Content-Type', 'application/json');
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
                        'dalam_pengawasan' => $request->get('dalam_pengawasan'),
                        'selesai_pemantauan' => $request->get('selesai_pemantauan'),
                        'dalam_pemantauan' => $request->get('dalam_pemantauan'),
                        'meninggal' => $request->get('meninggal'),
                    ]
                );
                if ($update) {
                    return
                        response($this->setJson('Data Updated Successfully!', true, []), 200)
                        ->header('Content-Type', 'application/json');
                } else {
                    return
                        response($this->setJson(
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
                    response($this->setJson(
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
                response($this->setJson([], false, [
                    'code' => 401,
                    'message' => 'Unauthorized Access!',
                ]), 401);
        }
    }

    private function setJson($data, $succes, $errors)
    {
        return [
            'success' => $succes,
            'errors' => $errors,
            'data' => $data,
        ];
    }
}
