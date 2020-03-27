<?php

namespace App\Http\Controllers;

use App\Kabupaten;
use Illuminate\Http\Request;

class KabupatenController extends Controller
{

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
        $district = Kabupaten::where('no', $no)->first();
        $PDP = 0;
        $ODP = 0;
        if ($request->has("PDP")) {
            $PDP = $request->get("PDP");
        } else {
            $PDP = $request->get("PDP") - $request->get("negatif") - $request->get("positif");
        }
        if ($request->has("ODP")) {
            $ODP = $request->get("ODP");
        } else {
            $ODP = $district->ODP - $request->get("PDP");
        }
        if ($request->has("positif")) {
            $district->positif = $request->get("positif");
        }
        if ($request->has('negatif')) {
            $district->negatif = $request->get('negatif');
        }
        $district->ODP = $ODP;
        $district->PDP = $PDP;
        $district->selesai_pengawasan = $request->get("positif") + $request->get("negatif");
        $district->dalam_pengawasan = $district->PDP - $district->selesai_pengawasan;
        $district->selesai_pemantauan = $request->get("selesai_pemantauan");
        $district->dalam_pemantauan = $district->ODP;
        $district->meninggal = $request->get('meninggal');
        $update = Kabupaten::where('no', $no)->update(
            [
                'ODP' => $district->ODP,
                'PDP' => $district->PDP,
                'positif' => $district->positif,
                'negatif' => $district->negatif,
                'selesai_pengawasan' => $district->selesai_pengawasan,
                'dalam_pengawasan' => $district->dalam_pengawasan,
                'selesai_pemantauan' => $district->selesai_pemantauan,
                'dalam_pemantauan' => $district->dalam_pemantauan,
                'meninggal' => $district->meninggal,
            ]
        );
        if ($update) {
            return response($this->setJson("Data Updated Successfully!", true, []), 201)
                ->header("Content-Type", "application/json");
        } else {
            return response($this->setJson([], false, [
                'code' => 400,
                'message' => 'Failed to update!'
            ]))
                ->header("Content-Type", 'Application/json');
        }
    }

    private function setJson($data, $succes, $errors)
    {
        return [
            'data' => $data,
            'success' => $succes,
            'errors' => $errors
        ];
    }
}
