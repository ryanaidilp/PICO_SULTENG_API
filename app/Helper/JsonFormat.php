<?php

class JsonFormat
{
    public static function setJson($data, $succes, $errors)
    {
        return [
            'success' => $succes,
            'errors' => $errors,
            'data' => $data,
        ];
    }
}
