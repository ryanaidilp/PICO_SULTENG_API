<?php

namespace App\Http\Controllers;

use App\RumahSakit;
use Illuminate\Http\Request;

class RumahSakitController extends Controller
{
    public function getAllRumahsakit()
    {
        return response(RumahSakit::all(), 200)
            ->header("Content-Type", "Application/json");
    }

    public function getRumahSakitByNo($no)
    {
        $rumahsakit = RumahSakit::where('no', $no)->firstOrFail();
        if ($rumahsakit === null) {
            return response(['status' => 'failed', 'message' => 'not found'], 404);
        } else {
            return response(RumahSakit::where('no', $no)->firstOrFail(), 200)
                ->header("Content-Type", "Application/json");
        }
    }
}
