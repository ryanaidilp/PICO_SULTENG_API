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

    public static function percentageValue($total, $data)
    {
        if ($total == 0) {
            return 0;
        }
        $percentage = ($data / $total) * 100;
        return round($percentage, 2);
    }

    public static function averageCount($sum, $total)
    {
        $data = $sum / (int) $total;
        return (float) number_format($data, 2);
    }
}
