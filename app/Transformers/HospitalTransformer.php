<?php

namespace App\Transformers;

use App\Hospital;
use League\Fractal\TransformerAbstract;

class HospitalTransformer extends TransformerAbstract
{
    public function transform(Hospital $hospital)
    {
        return [
            trans('general.no') => $hospital->no,
            trans('general.name') => $hospital->nama,
            trans('general.address') => $hospital->alamat,
            trans('general.telephone') => $hospital->telepon,
            trans('general.email') => $hospital->email,
            trans('general.longitude') => $hospital->longitude,
            trans('general.latitude') => $hospital->latitude,
    ];
    }
}
