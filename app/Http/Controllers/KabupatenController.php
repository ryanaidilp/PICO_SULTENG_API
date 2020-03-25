<?php

namespace App\Http\Controllers;

use App\Kabupaten;
use Illuminate\Http\Request;

class KabupatenController extends Controller
{
    public function getKabupatenByNo($no)
    {
        $kabupaten = Kabupaten::where('no', $no)->firstOrFail();
        $response = null;
        if ($kabupaten === null) {
            return response(['status' => 'failed', 'message' => 'not found'], 404);
        } else {
            $response = response($kabupaten, 200)
                ->header("Content-Type", 'Application/json');
        }
        return $response;
    }

    public function getAllKabupaten(Request $request)
    {
        $kabupaten = Kabupaten::all();
        return response($kabupaten, 200)
            ->header('Content-Type', 'application/json');
    }

    public function updateKabupaten($no, Request $request)
    {
        $kabupaten = Kabupaten::where('no', $no)->firstOrFail();
        $kabupaten->ODP = $kabupaten->ODP - $request->get("PDP");
        $kabupaten->PDP = $request->get("PDP") - $request->get("negatif") - $request->get("positive");
        $kabupaten->selesai_pengawasan = $request->get("positif") + $request->get("negatif");
        $kabupaten->dalam_pengawasan = $kabupaten->PDP;
        $kabupaten->selesai_pemantauan = $request->get("selesai_pemantauan");
        $kabupaten->dalam_pemantauan = $kabupaten->ODP;
        $kabupaten->meninggal = $request->get('meninggal');
        $update = Kabupaten::where('no', $no)->update(
            [
                'ODP' => $kabupaten->ODP,
                'PDP' => $kabupaten->PDP,
                'selesai_pengawasan' => $kabupaten->selesai_pengawasan,
                'dalam_pengawasan' => $kabupaten->dalam_pengawasan,
                'selesai_pemantauan' => $kabupaten->selesai_pemantauan,
                'dalam_pemantauan' => $kabupaten->dalam_pemantauan,
                'meninggal' => $kabupaten->meninggal,
            ]
        );
        if ($update) {
            $message = [
                'status' => 'updated'
            ];
            return response($message, 201);
        } else {
            return response(['status' => "failed"], 400);
        }
    }
}
