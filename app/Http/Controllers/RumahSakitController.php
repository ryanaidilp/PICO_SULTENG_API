<?php

namespace App\Http\Controllers;

use App\RumahSakit;

class RumahSakitController extends Controller
{

    public function __construct()
    {
        $this->middleware('throttle:1,2');
    }

    public function getAllRumahsakit()
    {
        return response(
            $this->setJson(RumahSakit::all(), true, []),
            200
        )
            ->header("Content-Type", "Application/json");
    }

    public function getRumahSakitByNo($no)
    {
        $hospital = RumahSakit::where('no', $no)->first();
        if ($hospital === null) {
            return response(
                $this->setJson($hospital, true, ['code' => 404, 'message' => 'Hospital not found!']),
                404
            );
        } else {
            return response(
                $this->setJson(RumahSakit::where('no', $no)->first(), true, []),
                200
            )
                ->header("Content-Type", "Application/json");
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
