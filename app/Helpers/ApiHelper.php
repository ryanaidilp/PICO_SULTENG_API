<?php

function setJson($data,  $errors, $success)
{
    return [
        'success' => $success,
        'errors' => $errors,
        'data' => $data
    ];
}

function percentageValue($total, $data)
{
    if ($total == 0) {
        return 0;
    }
    $percentage = ($data / $total) * 100;
    return round($percentage, 2);
}

function averageCount($sum, $total)
{
    $data = $sum / (int) $total;
    return (float) number_format($data, 2);
}
