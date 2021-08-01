<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    private $status_code = 200;

    public function getStatusCode()
    {
        return $this->status_code;
    }

    protected function setStatusCode($status_code)
    {
        $this->status_code = $status_code;
        return $this;
    }

    public function responseNotFound($message = "Not Found")
    {
        return $this->setStatusCode(404)->responseWithError($message);
    }

    public function responseInvalid($message = "Invalid Request")
    {
        return $this->setStatusCode(400)->responseWithError($message);
    }

    public function responseCreated($message = "Created successfully")
    {
        return $this->setStatusCode(201)->responseWithSuccess($message);
    }

    public function responseUpdated($message = "Updated successfully")
    {
        return $this->setStatusCode(201)->responseWithSuccess($message);
    }

    public function responseInternalError($message = "Internal Error")
    {
        return $this->setStatusCode(500)->responseWithError($message);
    }

    public function responseNoContent()
    {
        return $this->setStatusCode(204);
    }

    public function response($data, $headers = [], $errors = [])
    {
        $data = \setJson($data, $errors, empty($errors));
        return response()->json($data, $this->getStatusCode(), $headers);
    }

    protected function responseWithError($message)
    {
        $errors = [["message" => $message, "code" => $this->getStatusCode()]];
        return $this->response([], [], $errors);
    }
}
