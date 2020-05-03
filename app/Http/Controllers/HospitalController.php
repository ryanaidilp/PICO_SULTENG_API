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
        if (Hospital::all()->count() > 0) {
            return response(
                $this->setJson(Hospital::all(), true, []),
                200
            )
                ->header("Content-Type", "Application/json");
        } else {
            return response($this->setJson(['Hospital data is still empty!'], true, []), 200);
        }
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
