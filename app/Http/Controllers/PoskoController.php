<?php

namespace App\Http\Controllers;

use App\Kabupaten;
use App\Phone;
use App\Posko;
use Illuminate\Http\Request;

class PoskoController extends Controller
{
    public function __construct()
    {
        $this->middleware('throttle:1,2');
    }

    public function index()
    {
        $kabupaten = Kabupaten::all();
        $data = array();
        foreach ($kabupaten as $key => $dis) {
            $data[$key]['no'] = $dis->no;
            $data[$key]['nama'] = $dis->kabupaten;
            $data[$key]['posko'] = array();
            foreach ($dis->posko as $index => $pos) {
                $data[$key]['posko'][$index]['no'] = $index + 1;
                $data[$key]['posko'][$index]['nama'] = $pos->nama;
                foreach ($pos->phones as $idx => $phone) {
                    $data[$key]['posko'][$index]['no_hp'][$idx] = $phone->phone;
                }
            }
        }
        return response($this->setJson($data, true, []), 200)
            ->header('Content-Type', 'application/json');
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
