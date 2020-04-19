<?php

namespace App\Http\Controllers;

use App\Kabupaten;
use Illuminate\Http\Request;

class KabupatenController extends Controller
{

    public function __construct()
    {
        $this->middleware('throttle:1,2');
    }

    public function getKabupatenByNo($no)
    {
        $district = Kabupaten::where('no', $no)->first();
        if ($district === null) {
            return response($this->setJson([], false, [
                'code' => 404,
                'message' => 'District not found!'
            ]), 404);
        } else {
            $response = response($this->setJson($district, true, []), 200)
                ->header("Content-Type", 'Application/json');
        }
        return $response;
    }

    public function getAllKabupaten()
    {
        return response($this->setJson(Kabupaten::all(), true, []), 200)
            ->header('Content-Type', 'application/json');
    }

    public function updateKabupaten($no, Request $request)
    {
        if ($request->has('API_KEY')) {
            $API_KEY = $request->get('API_KEY');
            if ($API_KEY == "API_KEY") {
                $update = Kabupaten::where('no', $no)->update(
                    [
                        'ODP' => $request->get('ODP'),
                        'PDP' => $request->get('PDP'),
                        'positif' => $request->get("positif"),
                        'sembuh' => $request->get('sembuh'),
                        'negatif' => $request->get("negatif"),
                        'selesai_pengawasan' => $request->get("selesai_pengawasan"),
                        'dalam_pengawasan' => $request->get("dalam_pengawasan"),
                        'selesai_pemantauan' => $request->get("selesai_pemantauan"),
                        'dalam_pemantauan' => $request->get("dalam_pemantauan"),
                        'meninggal' => $request->get('meninggal'),
                    ]
                );
                if ($update) {
                    return response($this->setJson("Data Updated Successfully!", true, []), 201)
                        ->header("Content-Type", "application/json");
                } else {
                    return response($this->setJson([], false, [
                        'code' => 400,
                        'message' => 'Failed to update!'
                    ]), 400)
                        ->header("Content-Type", 'Application/json');
                }
            } else {
                return response($this->setJson([], false, [
                    'code' => 401,
                    'message' => 'Invalid API Key, Unauthorized Access!'
                ]), 401);
            }
        } else {
            return response($this->setJson([], false, [
                'code' => 401,
                'message' => 'Unauthorized Access!'
            ]), 401);
        }
    }

    private function setJson($data, $succes, $errors)
    {
        return [
            'success' => $succes,
            'errors' => $errors,
            'data' => $data
        ];
    }
}
