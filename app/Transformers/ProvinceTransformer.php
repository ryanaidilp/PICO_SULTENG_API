<?php

namespace App\Transformers;

use App\Province;
use League\Fractal\TransformerAbstract;

class ProvinceTransformer extends TransformerAbstract
{
    public function transform(Province $province)
    {
        return
            [
                trans('general.province_code') => $province->kode_provinsi,
                'updated_at' => $province->updated_at,
                trans('general.province') => $province->provinsi,
                trans('general.positive') => $province->positif,
                trans('general.under_treatment') => $province->dalam_perawatan,
                trans('general.death') => $province->meninggal,
                trans('general.recovered') => $province->sembuh,
                trans('general.death_rate') => $province->rasio_kematian,
                trans('general.map_id') => $province->map_id,
            ];
    }
}
