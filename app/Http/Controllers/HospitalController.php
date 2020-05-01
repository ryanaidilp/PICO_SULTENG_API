<?php

namespace App\Http\Controllers;

use App\Hospital;

class HospitalController extends Controller
{

    public function __construct()
    {
        $this->middleware('throttle:1,2');
    }

    public function index()
    {
        return response(
            $this->setJson(Hospital::all(), true, []),
            200
        )
            ->header("Content-Type", "Application/json");
    }

    public function show($no)
    {
        $hospital = Hospital::where('no', $no)->first();
        if ($hospital === null) {
            return response(
                $this->setJson($hospital, true, ['code' => 404, 'message' => 'Hospital not found!']),
                404
            );
        } else {
            return response(
                $this->setJson(Hospital::where('no', $no)->first(), true, []),
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
