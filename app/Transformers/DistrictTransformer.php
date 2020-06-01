<?php

namespace App\Transformers;

use App\District;
use League\Fractal\TransformerAbstract;

class DistrictTransformer extends TransformerAbstract
{
    public function transform(District $district)
    {
        return
            [
                trans('general.no') => $district->no,
                trans('general.district') => $district->kabupaten,
                trans('general.updated_at') => $district->updated_at,
                trans('general.positive') => $district->positif,
                trans('general.negative') => $district->negatif,
                trans('general.recovered') => $district->sembuh,
                trans('general.death') => $district->meninggal,
                trans('general.ODP') => $district->ODP,
                trans('general.finished_param', ['case' => trans('general.observation')]) => $district->selesai_pemantauan,
                trans('general.active_param', ['case' => trans('general.observation')]) => $district->dalam_pemantauan,
                trans('general.PDP') => $district->PDP,
                trans('general.finished_param', ['case' => trans('general.supervision')]) => $district->selesai_pengawasan,
                trans('general.active_param', ['case' => trans('general.supervision')]) => $district->dalam_pengawasan,
                trans('general.death_rate') => $district->rasio_kematian,
            ];
    }
}
