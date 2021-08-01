<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{

    public function index(Request $request)
    {

        $path = '/images/carbon.png';

        $view = 'home';

        return view($view, compact('path'));
    }
}
