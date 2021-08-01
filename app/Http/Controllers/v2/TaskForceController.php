<?php

namespace App\Http\Controllers\v2;

use App\Services\TaskForceService;
use App\Http\Controllers\Controller;

class TaskForceController extends Controller
{

    public function index()
    {
        $task_forces = (new TaskForceService)->all(72);
        if ($task_forces) {
            return $this->response($task_forces);
        } else {
            return $this->responseNotFound('Data gugus tugas tidak ditemukan.');
        }
    }
}
